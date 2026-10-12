<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Support\Media;
use Illuminate\Http\Request;

/** Rows of the "Projets réalisés" page. */
class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::query()->orderBy('sort_order')->orderBy('id')->get()]);
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project([
            'provider' => 'NEXORA DIGITAL SARL',
            'is_published' => true,
            'sort_order' => (int) Project::query()->max('sort_order') + 1,
        ])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['image'] = Media::replace($request->file('image'), 'projets');
        Project::query()->create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Le projet a été ajouté.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request, false);
        if ($request->hasFile('image')) {
            $data['image'] = Media::replace($request->file('image'), 'projets', $project->image);
        }
        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Le projet a été mis à jour.');
    }

    public function destroy(Project $project)
    {
        Media::delete($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Le projet a été supprimé.');
    }

    private function validated(Request $request, bool $creating): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:190'],
            'period' => ['required', 'string', 'max:120'],
            'client' => ['required', 'string', 'max:190'],
            'provider' => ['required', 'string', 'max:190'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
            'image' => [$creating ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
        unset($data['image']);
        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}

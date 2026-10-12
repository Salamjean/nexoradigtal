<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Support\Media;
use Illuminate\Http\Request;

/** Members of the "Notre équipe" grid (about page). */
class TeamMemberController extends Controller
{
    public function index()
    {
        return view('admin.team.index', ['members' => TeamMember::query()->orderBy('sort_order')->orderBy('id')->get()]);
    }

    public function create()
    {
        return view('admin.team.form', ['member' => new TeamMember([
            'is_published' => true,
            'sort_order' => (int) TeamMember::query()->max('sort_order') + 1,
        ])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['photo'] = Media::replace($request->file('photo'), 'equipe');
        TeamMember::query()->create($data);

        return redirect()->route('admin.team.index')->with('status', 'Le membre a été ajouté.');
    }

    public function edit(TeamMember $member)
    {
        return view('admin.team.form', ['member' => $member]);
    }

    public function update(Request $request, TeamMember $member)
    {
        $data = $this->validated($request, false);
        if ($request->hasFile('photo')) {
            $data['photo'] = Media::replace($request->file('photo'), 'equipe', $member->photo);
        }
        $member->update($data);

        return redirect()->route('admin.team.index')->with('status', 'Le membre a été mis à jour.');
    }

    public function destroy(TeamMember $member)
    {
        Media::delete($member->photo);
        $member->delete();

        return redirect()->route('admin.team.index')->with('status', 'Le membre a été supprimé.');
    }

    private function validated(Request $request, bool $creating): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'roles' => ['required', 'string', 'max:500'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
            'photo' => [$creating ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
        unset($data['photo']);
        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}

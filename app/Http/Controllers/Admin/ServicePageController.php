<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use App\Support\Media;
use Illuminate\Http\Request;

/** The six service pages: texts and images only (the pages themselves are fixed by the design). */
class ServicePageController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['pages' => ServicePage::ordered()]);
    }

    public function edit(ServicePage $servicePage)
    {
        return view('admin.services.edit', ['page' => $servicePage]);
    }

    public function update(Request $request, ServicePage $servicePage)
    {
        $image = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        $data = $request->validate([
            'tab_label' => ['required', 'string', 'max:40'],
            'card_title' => ['nullable', 'string', 'max:80'],
            'overview_title' => ['required', 'string', 'max:120'],
            'overview_text' => ['required', 'string', 'max:3000'],
            'name' => ['required', 'string', 'max:120'],
            'title' => ['required', 'string', 'max:120'],
            'para1' => ['required', 'string', 'max:3000'],
            'para2' => ['nullable', 'string', 'max:3000'],
            'overview_image' => $image,
            'image' => $image,
            'gallery' => ['nullable', 'array'],
            'gallery.*' => $image,
        ]);

        foreach (['overview_image', 'image'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = Media::replace($request->file($field), 'services', $servicePage->{$field});
            } else {
                unset($data[$field]);
            }
        }

        $gallery = $servicePage->gallery ?? [];
        foreach ([0, 1, 2] as $i) {
            if ($request->hasFile("gallery.$i")) {
                $gallery[$i] = Media::replace($request->file("gallery.$i"), 'services', $gallery[$i] ?? null);
            }
        }
        $data['gallery'] = array_values($gallery);

        $servicePage->update($data);

        return redirect()->route('admin.services.edit', $servicePage)->with('status', "La page « {$servicePage->name} » a été mise à jour.");
    }
}

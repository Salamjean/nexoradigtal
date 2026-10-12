<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\ServicePage;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'counts' => [
                'services' => ServicePage::query()->count(),
                'projects' => Project::query()->count(),
                'team' => TeamMember::query()->count(),
                'unread' => ContactMessage::query()->whereNull('read_at')->count(),
            ],
            'latestMessages' => ContactMessage::query()->latest()->limit(5)->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/** Messages sent through the contact page forms. */
class MessageController extends Controller
{
    public function index(Request $request)
    {
        $type = array_key_exists($request->query('type'), ContactMessage::TYPES) ? $request->query('type') : null;

        return view('admin.messages.index', [
            'messages' => ContactMessage::query()
                ->when($type, fn ($query) => $query->where('type', $type))
                ->latest()->paginate(20)->withQueryString(),
            'type' => $type,
        ]);
    }

    public function show(ContactMessage $message)
    {
        if ($message->read_at === null) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.messages.show', ['message' => $message]);
    }

    public function cv(ContactMessage $message)
    {
        abort_unless($message->cv_path && Storage::disk('local')->exists($message->cv_path), 404);

        $extension = pathinfo($message->cv_path, PATHINFO_EXTENSION);

        return Storage::disk('local')->download($message->cv_path, 'CV - ' . $message->name . '.' . $extension);
    }

    public function destroy(ContactMessage $message)
    {
        if ($message->cv_path) {
            Storage::disk('local')->delete($message->cv_path);
        }
        $message->delete();

        return redirect()->route('admin.messages.index')->with('status', 'Le message a été supprimé.');
    }
}

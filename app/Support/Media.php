<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Images of the editable content: either a bundled asset ("assets/img/...", the original Figma images)
 * or a file uploaded from the admin panel, stored on the "public" disk under "uploads/".
 */
class Media
{
    public static function url(?string $path): string
    {
        if (blank($path)) {
            return '';
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }

    /** Stores an uploaded image and deletes the previous upload (bundled assets are never deleted). */
    public static function replace(UploadedFile $file, string $folder, ?string $previous = null): string
    {
        $path = $file->store('uploads/' . $folder, 'public');
        self::delete($previous);

        return $path;
    }

    public static function delete(?string $path): void
    {
        if ($path && str_starts_with($path, 'uploads/')) {
            Storage::disk('public')->delete($path);
        }
    }
}

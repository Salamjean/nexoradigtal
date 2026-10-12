<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * One of the six service pages. The slug is fixed: the pixel layout of each page comes from
 * config/nexora_services.php, the texts and images from this table.
 */
#[Fillable(['slug', 'sort_order', 'tab_label', 'card_title', 'overview_title', 'overview_text', 'overview_image', 'name', 'title', 'para1', 'para2', 'image', 'gallery'])]
class ServicePage extends Model
{
    protected function casts(): array
    {
        return ['gallery' => 'array'];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function imageUrl(): string
    {
        return Media::url($this->image);
    }

    public function overviewImageUrl(): string
    {
        return Media::url($this->overview_image);
    }

    /** @return string[] gallery image URLs, left to right */
    public function galleryUrls(): array
    {
        return array_map(fn ($path) => Media::url($path), $this->gallery ?? []);
    }

    /** Pages in tab order */
    public static function ordered()
    {
        return static::query()->orderBy('sort_order')->get();
    }
}

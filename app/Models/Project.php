<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/** A row of the "Projets réalisés" page. A line break in the title is kept on desktop. */
#[Fillable(['title', 'period', 'client', 'provider', 'image', 'sort_order', 'is_published'])]
class Project extends Model
{
    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('sort_order')->orderBy('id');
    }

    public function imageUrl(): string
    {
        return Media::url($this->image);
    }
}

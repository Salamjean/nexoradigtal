<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/** A member of the "Notre équipe" grid on the about page. One role line per line of "roles". */
#[Fillable(['name', 'roles', 'photo', 'sort_order', 'is_published'])]
class TeamMember extends Model
{
    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('sort_order')->orderBy('id');
    }

    /** @return string[] */
    public function roleLines(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', (string) $this->roles)), 'strlen'));
    }

    public function photoUrl(): string
    {
        return Media::url($this->photo);
    }
}

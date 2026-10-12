<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/** A message sent through one of the contact page forms ("renseignements" or "carrieres"). */
#[Fillable(['type', 'name', 'email', 'phone', 'subject', 'message', 'skills', 'experience', 'cv_path', 'read_at'])]
class ContactMessage extends Model
{
    public const TYPES = [
        'renseignements' => 'Renseignements généraux',
        'carrieres' => 'Opportunités de carrière',
    ];

    protected function casts(): array
    {
        return ['read_at' => 'datetime'];
    }

    public function typeLabel(): string
    {
        return self::TYPES[$this->type] ?? $this->type;
    }
}

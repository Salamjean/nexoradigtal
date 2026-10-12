<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/** Company information, one row per key (see config/nexora_site.php and App\Support\Site). */
#[Fillable(['key', 'value'])]
class Setting extends Model
{
}

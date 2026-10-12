<?php

namespace App\Support;

use App\Models\Setting;
use Throwable;

/**
 * Company information for the views: the "settings" table merged over config/nexora_site.php.
 * Loaded once per application instance (i.e. per request); falls back to the defaults when the
 * database is unreachable.
 */
class Site
{
    private const BINDING = 'nexora.site';

    public static function all(): array
    {
        $app = app();
        if (! $app->bound(self::BINDING)) {
            $stored = [];
            try {
                $stored = Setting::query()->pluck('value', 'key')->filter(fn ($v) => $v !== null && $v !== '')->all();
            } catch (Throwable) {
                // No database (fresh install, error page...): keep the defaults
            }
            $app->instance(self::BINDING, array_merge(config('nexora_site', []), $stored));
        }

        return $app->make(self::BINDING);
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        return self::all()[$key] ?? $default;
    }

    /** Lines of a multi-line setting (address, footer tagline). */
    public static function lines(string $key): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', (string) self::get($key))), 'strlen'));
    }

    /** "tel:" link target for a phone setting. */
    public static function tel(string $key): string
    {
        return 'tel:' . preg_replace('/[^\d+]/', '', (string) self::get($key));
    }

    /** Called after the settings are saved. */
    public static function forget(): void
    {
        app()->forgetInstance(self::BINDING);
    }
}

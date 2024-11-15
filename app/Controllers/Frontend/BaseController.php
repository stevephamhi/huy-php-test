<?php

namespace App\Controllers\Frontend;

abstract class BaseController
{
    public const VIEW_PREFIX = 'frontend';

    public function view($path)
    {
        return view(self::VIEW_PREFIX . '.pages.' . $path);
    }
}
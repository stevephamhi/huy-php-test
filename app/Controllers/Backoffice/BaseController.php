<?php

namespace App\Controllers\Backoffice;

abstract class BaseController
{
    public const VIEW_PREFIX = 'backoffice';

    public function view($path)
    {
        return view(self::VIEW_PREFIX . '.pages.' . $path);
    }
}
<?php

namespace Core;

class App {
    public function __construct()
    {
        $this->bootHelpers();
        $this->bootControllers();
        $this->bootRoutes();
        $this->bootProviders();
    }

    private function bootHelpers()
    {
        $file = APP_PATH . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR . 'helpers.php';

        if (file_exists($file)) {
            require $file;
        }
    }

    private function bootRoutes()
    {
        $file = MAIN_PATH . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';

        if (file_exists($file)) {
            require $file;
        }
    }

    private function bootControllers()
    {
        $controllerDirs = filter_files(scandir(APP_PATH . DIRECTORY_SEPARATOR . 'Controllers'));

        foreach ($controllerDirs as $dirName) {
            $controllers = filter_files(
                scandir(APP_PATH . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . $dirName)
            );

            if (empty($controllers)) {
                return;
            }

            foreach ($controllers as $controller) {
                $file = APP_PATH . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $controller;

                if (file_exists($file)) {
                    require $file;
                }
            }
        }
    }

    private function bootProviders()
    {
        require provider('RouteProvider');
    }
}

new App;
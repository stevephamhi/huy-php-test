<?php

namespace Core;

class View
{
    public $path;
    protected $sections = [];
    protected $extends;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public static function make($path)
    {
        return new static($path);
    }

    public function render()
    {
        // Read the content of the template file
        $content = file_get_contents($this->parsePath($this->path));

        // Process the content to handle sections and layout inheritance
        $content = $this->processTemplate($content);

        // If the view extends a layout, include it
        if ($this->extends) {
            $layoutContent = file_get_contents($this->parsePath($this->extends));
            $layoutContent = $this->processTemplate($layoutContent);

            // Replace each @child('name') with the corresponding section content
            foreach ($this->sections as $name => $sectionContent) {
                $layoutContent = str_replace("@child('$name')", $sectionContent, $layoutContent);
            }

            $content = $layoutContent;
        }

        // Evaluate the final processed content
        eval('?>' . $content);
    }

    public function parsePath($path)
    {
        $parsedPath = str_replace('.', DIRECTORY_SEPARATOR, $path);

        $fullPath = RESOURCE_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $parsedPath . '.html';

        if (file_exists($fullPath)) {
            return $fullPath;
        }

        // echo $fullPath;

        throw new \Exception('View Not Found with path: ' . $parsedPath);
    }

    private function processTemplate($content)
    {
        // Replace {{ expression }} with <?php echo expression; -> {{  }}
        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?php echo $1; ?>', $content);
        
        // Handle @section('name') ... @endsection
        $content = preg_replace_callback('/@section\(\s*[\'"](.+?)[\'"]\s*\)(.*?)@endsection/s', function($matches) {
            // Process @include within the section content
            $sectionContent = $this->processIncludes($matches[2]);
            $this->sections[$matches[1]] = $sectionContent;
            return ''; // Remove the section from the content
        }, $content);

        // Handle @extends('views.frontend.layouts.master')
        $content = preg_replace_callback('/@extends\(\s*[\'"](.+?)[\'"]\s*\)/', function($matches) {
            $this->extends = $matches[1];
            return ''; // Remove the extends directive from the content
        }, $content);

        // Process @include outside of sections as well
        $content = $this->processIncludes($content);

        return $content;
    }

    private function processIncludes($content)
    {
        // Handle @include('path')
        return preg_replace_callback('/@include\(\s*[\'"](.+?)[\'"]\s*\)/', function($matches) {
            $includePath = $matches[1];
            $includeContent = file_get_contents($this->parsePath($includePath));
            return $this->processTemplate($includeContent); // Process the included file
        }, $content);
    }
}
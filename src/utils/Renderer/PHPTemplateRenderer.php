<?php

namespace App\Trello\utils\Renderer;

class PHPTemplateRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        extract($arguments);

        ob_start();
        include($templateString);
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}


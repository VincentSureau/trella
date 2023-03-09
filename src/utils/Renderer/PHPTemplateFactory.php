<?php

namespace App\Trello\utils\Renderer;

use App\Trello\utils\Renderer\TemplateFactory;
use App\Trello\utils\Renderer\PHPTemplateRenderer;

class PHPTemplateFactory implements TemplateFactory
{
    public function getRenderer(): TemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}
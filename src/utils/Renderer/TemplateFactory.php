<?php

namespace App\Trello\utils\Renderer;

use App\Trello\utils\Renderer\TemplateRenderer;

interface TemplateFactory
{
    public function getRenderer(): TemplateRenderer;
}
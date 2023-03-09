<?php

namespace App\Trello\utils\Renderer;

interface TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string;
}
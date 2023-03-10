<?php

namespace App\Trello\utils\Renderer;

use App\Trello\utils\Renderer\TemplateRenderer;

class SmartyTemplateRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        $smarty = new \Smarty();
        $smarty->setTemplateDir(dirname(__DIR__, 2).'/views');
        $smarty->setConfigDir(dirname(__DIR__, 2).'/config');
        $smarty->setCompileDir(dirname(__DIR__, 2).'/views_c');
        $smarty->setCacheDir(dirname(__DIR__, 2).'/cache');

        foreach($arguments as $key => $value)
        {
            $smarty->assign($key, $value);
        }

        ob_start();
        $smarty->display($templateString . '.php');
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}

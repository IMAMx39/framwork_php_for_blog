<?php

namespace Core;

final class Render
{
    public static function render(string $view, array $data): string
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once(dirname(__DIR__) . "/templates/$view.php");
        return ob_get_clean();
    }
}

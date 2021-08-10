<?php
namespace App;

class View
{
    public static function render(string $template, ?array $data = []): string
    {
        ob_start();
        include '../views/' . $template;
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}

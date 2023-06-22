<?php

namespace Core;

use Exception;
use RuntimeException;

class Request
{
    public function getPath(): string
    {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }

    public function isGET(): bool
    {
        return $this->method() === 'GET';
    }

    public function method(): string
    {

        return $_SERVER['REQUEST_METHOD'];

    }

    public function isPOST(): bool
    {
        return $this->method() === 'POST';
    }

    public function query(): array
    {
        return $_GET;
    }

    public function request(): array
    {
        return $_POST;
    }

    public static function getData($varname, $isNum = false) : string
    {
        $value = isset($_POST[$varname]) ? trim(htmlspecialchars($_POST[$varname])) : false;

        if(!$value) {
            throw new RuntimeException();
        }

        return $value;
    }


}

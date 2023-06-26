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

    public function post(string $key) : string
    {
        if (!array_key_exists($key, $_POST) ) {
            throw new \InvalidArgumentException($key. ' not exist');
        }

        return trim(htmlspecialchars($_POST[$key]));
    }
}

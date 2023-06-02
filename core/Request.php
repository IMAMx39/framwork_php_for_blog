<?php

namespace Core;

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

        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function isPOST(): bool
    {
        return $this->method() === 'POST';
    }

    public function query(): array
    {
        $data = [];
        foreach ($_GET as $key => $value) {
            $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        return $data;
    }

    public function request(): array
    {
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $data;
    }
}

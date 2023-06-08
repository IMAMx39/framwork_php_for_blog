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

        return $_SERVER['REQUEST_METHOD'];

    }

    public function isPOST(): bool
    {
        return $this->method() === 'POST';
    }

    public function query(): array
    {
//        $data = [];
//        foreach ($_GET as $key => $value) {
//            $data[$key] = filter_input(INPUT_GET, $value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//        }

        return $_GET;
    }

    public function request(): array
    {
//        $data = [];
//        if ($this->isPOST()){
//            foreach ($_POST as $key => $value) {
//                $data[$key] = $value;
//            }
//        }
        return $_POST;
    }
}

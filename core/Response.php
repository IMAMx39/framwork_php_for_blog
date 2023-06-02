<?php

namespace Core;

class Response
{
    private string|array $content;
    private int $status;


    public function __construct(string|array $content = '', int $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    /**
     * @return string|array
     */
    public function getContent(): string | array
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

}

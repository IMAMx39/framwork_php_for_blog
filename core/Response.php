<?php

namespace Core;

class Response
{

    public function statusCode(int $status): void
    {
        http_response_code($status);
    }

}

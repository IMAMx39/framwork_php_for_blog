<?php

namespace Core;

class Response
{

    public function statusCode(int $status)
    {
        http_response_code($status);
    }

}

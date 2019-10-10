<?php

namespace App\Observers;

use App\Response;

class ResponseObserver
{
    public function deleting(Response $response)
    {
        $response->files()->delete();
    }
}
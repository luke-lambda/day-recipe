<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait RecipeTrait
{
    public function requireRecipe($url)
    {
        $client = new Client();
        $response = $client->get($url);

        return $response;
    }
}

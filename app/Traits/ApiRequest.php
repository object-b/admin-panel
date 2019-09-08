<?php

namespace App\Traits;

use Config;
use GuzzleHttp\Client;

trait ApiRequest
{
    public static function run($method, $requestUrl, $requestData = [])
    {
        $url = Config::get('app.apiUrl') . $requestUrl;
        $adminToken = Config::get('app.adminToken');
        $client = new Client();

        $data = ['headers' => ['X-Authorization' => $adminToken]];

        if ($requestData) {
            $data['json'] = $requestData;
        }

        $api_response = $client->{$method}($url, $data);

        return json_decode($api_response->getBody()->getContents(), true);
    }
}
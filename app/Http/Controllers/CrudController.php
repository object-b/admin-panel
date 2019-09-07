<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use GuzzleHttp\Client;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function users()
    {
        $url = Config::get('app.apiUrl');
        $client = new Client();
        $api_response = $client->get($url . '');
        $response = json_decode($api_response);
        
        return view('users');
    }

    public function objects()
    {
        $url = Config::get('app.apiUrl');
        $adminToken = Config::get('app.adminToken');
        $client = new Client();
        $api_response = $client->get($url . 'api/objects?page=1', [
            'headers' => ['X-Authorization' => $adminToken]
        ]);
        $response = json_decode($api_response->getBody()->getContents(), true);

        return view('objects', compact('response'));
    }
}

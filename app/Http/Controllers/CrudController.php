<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use GuzzleHttp\Client;
use App\Traits\ApiRequest;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function users()
    {
        $response = ApiRequest::run('get', 'api/admin/users');
        
        return view('users', compact('response'));
    }

    public function objects()
    {
        $response = ApiRequest::run('get', 'api/admin/objects');
        
        return view('objects', compact('response'));
    }

    public function editObject($id)
    {
        $response = ApiRequest::run('get', 'api/admin/objects/' . $id);
        
        return view('edit', compact('response', 'id'));
    }

    public function updateObject(Request $request, $id)
    {
        $response = ApiRequest::run('put', 'api/admin/objects/' . $id, $request->except('_token'));
        
        return redirect('objects')->with('status', 'Object updated!');
    }

    public function deleteObject($id)
    {
        $response = ApiRequest::run('delete', 'api/admin/objects/' . $id);
        
        return redirect('objects')->with('status', 'Object removed!');
    }
}

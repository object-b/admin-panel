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
    
    // Users roles
    public function userRoles()
    {
        $response = ApiRequest::run('get', 'api/admin/users/roles');
        
        return view('users-roles', compact('response'));
    }

    public function editUserRole($id)
    {
        $response = ApiRequest::run('get', 'api/admin/users/roles/' . $id);
        $route = 'updateUserRole';
        
        return view('edit', compact('response', 'id', 'route'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $response = ApiRequest::run('put', 'api/admin/users/roles/' . $id, $request->except('_token'));
        
        return redirect('users/roles')->with('status', 'User role updated!');
    }

    // Users
    public function users()
    {
        $response = ApiRequest::run('get', 'api/admin/users');
        
        return view('users', compact('response'));
    }

    public function editUser($id)
    {
        $response = ApiRequest::run('get', 'api/admin/users/' . $id);
        $route = 'updateUser';
        
        return view('edit', compact('response', 'id', 'route'));
    }

    public function updateUser(Request $request, $id)
    {
        $response = ApiRequest::run('put', 'api/admin/users/' . $id, $request->except('_token'));
        
        return redirect('users')->with('status', 'User updated!');
    }

    // Objects
    public function objects()
    {
        $response = ApiRequest::run('get', 'api/admin/objects');
        
        return view('objects', compact('response'));
    }

    public function editObject($id)
    {
        $response = ApiRequest::run('get', 'api/admin/objects/' . $id);
        $route = 'updateObject';
        
        return view('edit', compact('response', 'id', 'route'));
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

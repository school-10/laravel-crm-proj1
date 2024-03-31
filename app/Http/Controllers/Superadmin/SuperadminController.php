<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\SuperadminService;
use App\Http\Controllers\Controller;

class SuperadminController extends Controller
{
    //superadmins can view and edit ther profile, can access dashboard
    public function index()
    {
        return view('superadmin.index');
    }

    public function show(string $id)
    {
        return view('superadmin.show', ['superadmin' => UserService::findUser($id)]);
    }


    public function edit(string $id)
    {
        return view('superadmin.edit', ['superadmin' => UserService::findUser($id)]);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['superadmin_id'] = $id;
        $success = SuperadminService::update($data);
        if (!$success) {
            return redirect()->route('superadmin.index')->with('success', 'Profile updated successfully');
        } else {
            return redirect()->route('superadmin.index')->with('error', 'Something went wrong');
        }
    }
}
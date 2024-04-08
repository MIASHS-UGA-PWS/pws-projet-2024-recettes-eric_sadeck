<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

 //Constructor
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = \App\Models\Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Validate the request creation
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:roles',
    ]);

    if ($validator->fails()) {
        return redirect()->route('roles.create')
                    ->withErrors($validator)
                    ->withInput();
    }
        // Create the role
        $role = new \App\Models\Role;
        $role->name = $request->input('name');
        $role->save();

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = \App\Models\Role::findOrFail($id);
        return view('admin.roles.show', compact('role'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = \App\Models\Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',
        ]);

        if ($validator->fails()) {
            return redirect()->route('roles.edit' , $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $role = \App\Models\Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = \App\Models\Role::findOrFail($id);
        $role->delete();

        return redirect('admin/roles');
    }
}

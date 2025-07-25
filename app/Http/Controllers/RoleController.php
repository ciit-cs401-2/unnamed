<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'role_name' => 'required|max:255',
                'description' => 'max:255'
            ]);
            Role::create($validatedData);
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role created successfully.');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $role = Role::find($id);
            $validatedData = $request->validate([
                'role_name' => 'required|max:255',
                'description' => 'max:255'
            ]);
            $role->update($validatedData);
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role updated successfully.');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::find($id);
            $role->delete();
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role was deleted.');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

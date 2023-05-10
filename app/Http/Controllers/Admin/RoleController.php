<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return Inertia::render('Admin/Role/Index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'unique:roles,name']
        ]);

        Role::create($validated);

        return redirect()->route('admin.roles.index')->with('alert', ['type' => 'success', 'message' => 'Role created successfully!']);
    }

    public function edit(Role $role)
    {
        $role = $role->load('permissions');
        $permissions = Permission::all();
        return Inertia::render('Admin/Role/Edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['role' => ['required', 'min:3', Rule::unique('roles', 'name')->ignore($role->id)]]);

        $role->name = $validated['role'];
        $role->update();

        return redirect()->back();
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('alert', ['type' => 'success', 'message' => 'Role deleted!']);
    }

    public function givePermission(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permission' => ['required', 'min:3', 'exists:permissions,name']
        ]);

        if ($role->hasPermissionTo($validated['permission'])) {
            return back()->with('alert', ['type' => 'warning', 'message' => 'Permission exists.']);;
            
        }

        $role->givePermissionTo($validated['permission']);

        return back()->with('alert', ['type' => 'success', 'message' => 'Permission added.']);
        
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('alert', ['type' => 'success', 'message' => 'Permission revoked.']);
        }
    }
}

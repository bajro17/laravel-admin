<?php

namespace App\Http\Controllers;

use App\Role;
use App\Link;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $links = Link::all();
        return view('admin.role.create_role',compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required'
        ]);
        $role = new Role;

          $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->save();
        $role->links()->sync($request->get('link'), false);
        session()->flash('message', 'Role created successfully');
        return redirect('admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      $links = Link::all();
        return view('admin.role.edit_role', compact('role', 'links'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      $this->validate($request, [
        'name' => 'required',
        'description' => 'required'
      ]);


        $role->name = $request->get('name');
      $role->description = $request->get('description');
      $role->update();
      $role->links()->sync($request->get('link'));
      session()->flash('message', 'Role edited successfully');
      return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}

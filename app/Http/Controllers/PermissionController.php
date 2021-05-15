<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Laravue\Models\Permission;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Permission as per;

class PermissionController extends Controller
{
    public function index(){
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = per::all();

        return view('admin.permission.index', compact('clients'));
    }

    public function create(){
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.permission.add');
    }

    public function store(PermissionRequest  $request){
        $permission= \App\Models\Permission::create($request->all());
        return redirect()->route('permission.index');
    }
    public function show(per $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.show', compact('permission'));
    }

    public function edit(per $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, per $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }


}

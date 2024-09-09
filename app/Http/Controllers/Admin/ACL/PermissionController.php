<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUpdatePermissions;

use App\Services\Admin\PermissionService;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
        $this->middleware(['can:permissões']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->paginate();
        return view("admin.pages.permissions.index", compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param StoreUpdatePermissions
     */
    public function store(StoreUpdatePermissions $request)
    {
        $this->permissionService->store($request->all());
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$permissions = $this->permissionService->getById($id)){
            return redirect()->back();
        }
        return view('admin.pages.permissions.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!$permissions = $this->permissionService->getById($id)){
            return redirect()->back();
        }
        return view('admin.pages.permissions.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePermissions $request, string $id)
    {
        $this->permissionService->update($request->all(),$id);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permissionService->destroy($id);
        return redirect()->route('permissions.index');
    }

    public function search(Request $request)
    {

        $filters = $request->only("filter");
        $permissions = $this->permissionService->search($request);

        return view("admin.pages.permissions.index", compact('permissions','filters'));
    }

}

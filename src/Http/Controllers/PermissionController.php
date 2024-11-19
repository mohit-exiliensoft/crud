<?php

namespace User\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User\Crud\Interfaces\PermissionRepositoryInterface;
use User\Crud\Models\Permission;
use DB;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions = Permission::get();
        return view('crud::permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('crud::permission.create');
    }
    public function store(Request $request)
    {
        $permissionDetails = $request->only([
            'name'
        ]);

        try {
            DB::beginTransaction();
            $this->permissionRepository->createPermission($permissionDetails);
            DB::commit();

            return redirect()->route('permission.index')->with('message', trans('app.permission.permission_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->getPermissionById(($id));
        return view('crud::permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permissionDetails = $request->only([
            'name',
        ]);
        try {
            DB::beginTransaction();
            $this->permissionRepository->updatePermission($id, $permissionDetails);
            DB::commit();

            return redirect()->route('permission.index')->with('message', trans('app.permission.permission_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $permission = $this->permissionRepository->getPermissionById(($id));
        return view('crud::permission.show', compact('permission'));
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->permissionRepository->deletePermissionById($id);
            DB::commit();

            return redirect()->route('permission.index')->with('message', trans('app.permission.permission_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

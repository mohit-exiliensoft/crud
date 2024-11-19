<?php

namespace User\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use User\Crud\Http\Requests\role\CreateRoleRequest;
use User\Crud\Http\Requests\role\UpdateRoleRequest;
use User\Crud\Interfaces\RoleRepositoryInterface;
use User\Crud\Models\Permission;
use User\Crud\Models\Role;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = Role::get();
        return view('crud::role.index', compact('roles'));
    }

    public function create()
    {
        // $permissions = Permission::get();
        return view('crud::role.create');
    }

    public function store(Request $request)
    {
        $roleDetails = $request->only([
            'name',
        ]);
        try {
            DB::beginTransaction();
            $this->roleRepository->createRole($roleDetails);
            DB::commit();

            return redirect()->route('role.index')->with('message', trans('app.user.user_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $role = $this->roleRepository->getRoleById($id);    
        return view('crud::role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $roleDetails = $request->only([
            'name',
        ]);

        try {
            DB::beginTransaction();
            $this->roleRepository->updateRole($id, $roleDetails);
            DB::commit();

            return redirect()->route('role.index')->with('message', trans('app.user.user_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $role = $this->roleRepository->getRoleById($id);
        return view('crud::role.show', compact('role'));
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->roleRepository->deleteRoleById($id);
            DB::commit();

            return redirect()->route('role.index')->with('message', trans('app.user.user_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

<?php 

namespace User\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use User\Crud\Http\Requests\user\CreateUserRequest;
use User\Crud\Http\Requests\user\UpdateUserRequest;
use User\Crud\Interfaces\AdminUserRepositoryInterface;
use User\Crud\Models\Role;

class UserController extends Controller
{

    protected $adminUserRepository;

    public function __construct(
        AdminUserRepositoryInterface $adminUserRepository,
        )
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    public function index()
    {
        $users = User::get();
        return view('crud::user.index',compact('users'));
    }

    public function create()
    {
        return view('crud::user.create');
    }

    public function store(CreateUserRequest $request)
    {

     $userDetails = $request->only([
        'name',
        'email',
        'phone',
        'password',
        'address',
        'profile_pic',
        'status',
     ]); 
     try {
        DB::beginTransaction();
        $this->adminUserRepository->createUser($userDetails);
        DB::commit();

        return redirect()->route('users.index')->with('message', trans('app.users.created'));
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', $e->getMessage())->withInput();
    }

    }

    public function edit($id)
    {
        $user = $this->adminUserRepository->getUserById(($id));
        return view('crud::user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request,$id)
    {
       $userDetails = $request->only([
        'name',
        'email',
        'status',
        'address',
        'phone',
       ]);
       try {
        DB::beginTransaction();
        $this->adminUserRepository->updateUser($id,$userDetails);
        DB::commit();

        return redirect()->route('users.index')->with('message', trans('app.users.updated'));
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', $e->getMessage())->withInput();
    }
       
    }

    public function show($id)
    {
      $user = $this->adminUserRepository->getUserById($id);
      return view('crud::user.show',compact('user'));
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $this->adminUserRepository->deleteUserById($id);
            DB::commit();

            return redirect()->route('users.index')->with('message', trans('app.users.deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

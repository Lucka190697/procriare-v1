<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Farm;

use App\Repositories\UserRepository;

use App\Http\Requests\UserRequest;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request, Farm $farm)
    {
        $title = 'Users';
        $farms = Farm::all();
        foreach ($farms as $farm_item) {
            $farm_item->id;
        }

        $users = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('users', 'farms', 'farm_item', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $title = 'CreateUser';
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles', 'title'));
    }

    public function store(UserRequest $userRequest, UserRepository $auxiliaryClass,
                          User $user, Farm $farm)
    {
        $data = $auxiliaryClass->createProfileImage($userRequest);
        $data = $auxiliaryClass->createUser($data);

        $user->create($data);

        $user->assignRole($userRequest->input('roles'));
        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT))
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);

        $mensagem = $userRequest->messages();
        $userRequest->session()->flash('alert-primary', 'Usuário Cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(UserRequest $userRequest, UserRepository $auxiliaryClass, $id)
    {
        $data = $userRequest->all();
        $data = $auxiliaryClass->updateProfileimage($data, $userRequest);
        $data = $auxiliaryClass->updateUser($data);

        $user = User::find($id);
        $user->update($data);

        $user->assignRole($userRequest->input('roles'));
        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT))
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);

        $mensagem = $userRequest->messages();
        $userRequest->session()->flash('alert-primary', 'Usuário Cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User created successfully');
    }

    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Usuário Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User deleted successfully');
    }

    public function search()
    {
        dd('pesquisar');
        return redirect()->route('admin.user.index');
    }
}

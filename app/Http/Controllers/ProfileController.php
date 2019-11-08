<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(ProfileRequest $request, UserRepository $auxiliaryClass, User $user)
    {
        $data = $request->all();
        $createProfile = $auxiliaryClass->updateProfileimage($data, $request);
        $createProfile['farm_id'] = auth()->user()->id;

        $data = auth()->user()->update($createProfile);

        return back()->withStatus(__('Perfil atualizado com sucesso!'));
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Senha alterada com sucesso!'));
    }
}

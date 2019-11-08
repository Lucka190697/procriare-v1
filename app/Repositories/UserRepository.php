<?php

namespace App\Repositories;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function createProfileImage($userRequest)
    {
        $data = $userRequest->all();
        if ($userRequest->thumbnail != null) {
            $profile = $userRequest->file('thumbnail');
            request()->thumbnail->move('storage/profiles', $userRequest->name);
            $data = $userRequest->all();
            $data['thumbnail'] = $userRequest->name;
            return $data;
        } else
            return self::profileDefault($data);
    }

    public static function profileDefault($data)
    {
        $profileName = $data['name'];
        $profile = copy('default.jpg', public_path() . '/profiles/' . $profileName);
        $data['thumbnail'] = $data['name'];

        return $data;

    }

    public function createUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['farm_id'] = auth()->user()->id;

        return $data;
    }

    public function createProfile($data, UserRequest $userRequest)
    {
        $data = $userRequest->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $data;
    }

    public function updateUser($data)
    {
//        if (empty($data['password']))
//            $data = array_except($data, array('email'));
//        if (!empty($input['email']))
            $data['password'] = Hash::make($data['password']);
//        else
//            $data = array_except($data, array('password'));

        $data['id_farms'] = auth()->user();

//        DB::table('model_has_roles')->where('model_id', $id)->delete();
//        $user->assignRole($userRequest->input('roles'));

        return $data;
    }

    public function updateProfileimage($data, $userRequest)
    {
        $data = $userRequest->all();
        if ($userRequest->thumbnail != null) {
            $profile = $userRequest->file('thumbnail');
            request()->thumbnail->move('storage/profiles', $userRequest->name);
            $data = $userRequest->all();
            $data['thumbnail'] = $userRequest->name;
            return $data;
        } else {
            return self::profileDefault($data);
        }
    }
}

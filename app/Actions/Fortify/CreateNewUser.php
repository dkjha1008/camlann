<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\PublicationReporter;
use App\Models\UserStudio;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Illuminate\Support\Facades\Notification;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required'],
        ])->validate();

        $user = new User;
        $user->role = $input['role'];
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();


        if($input['role'] == 'reporter' && $input['publication_id']){

            $store = new PublicationReporter;
            $store->users_id = $user->id;
            $store->publication_id = $input['publication_id'];
            $store->save();
        }

        if($input['role'] == 'studio' && $input['studio_name']){

            $store = new UserStudio;
            $store->users_id = $user->id;
            $store->studio_name = $input['studio_name'];
            $store->save();
        }
        
        return $user;
    }
}

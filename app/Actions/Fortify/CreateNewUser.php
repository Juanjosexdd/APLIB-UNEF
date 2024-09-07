<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'document_type_id' => ['required', 'integer'],
            'identification_card' => ['required', 'string', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date'],
            'sex' => ['required', 'integer'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'document_type_id' => $input['document_type_id'],
            'identification_card' => $input['identification_card'],
            'birthdate' => $input['birthdate'],
            'sex' => $input['sex'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'type_user_id' => 4, // Valor predeterminado
            'status_id' => 1, // Valor predeterminado
        ]);
    }
}

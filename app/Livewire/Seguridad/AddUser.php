<?php

namespace App\Livewire\Seguridad;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Configuration\DocumentType;
use App\Models\Configuration\TypeUser;
use App\Models\Security\Statu;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddUser extends Component
{
    use LivewireAlert;
    public $open = false;

    #[Validate]
    public $name;
    #[Validate]
    public $lastname;
    #[Validate]
    public $username;
    #[Validate]
    public $birthdate;
    #[Validate]
    public $phone;
    #[Validate]
    public $address;
    #[Validate]
    public $email;
    #[Validate]
    public $document_type_id;
    #[Validate]
    public $type_user_id;
    #[Validate]
    public $status_id;
    #[Validate]
    public $identification_card;
    #[Validate]
    public $password;
    #[Validate]
    public $password_confirmation;
    #[Validate]
    public $sex;
    #[Validate]

    public $document_types;
    public $type_users;
    public $status;

    public function mount()
    {
        $this->document_types = DocumentType::all();
        $this->type_users = TypeUser::all();
        $this->status = Statu::all();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'username' => 'required|max:32',
            'birthdate' => 'required|date',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'document_type_id' => 'required',
            'type_user_id' => 'required',
            'status_id' => 'required',
            'identification_card' => 'required|min:6|max:8',
            'password' => 'required|confirmed',
            'sex' => 'required|boolean',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'slug' => Str::slug($this->username),
            'sex' => $this->sex,
            'birthdate' => $this->birthdate,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'document_type_id' => $this->document_type_id,
            'type_user_id' => $this->type_user_id,
            'status_id' => $this->status_id,
            'identification_card' => $this->identification_card,
            'password' => Hash::make($this->password),
        ]);

        $this->open = false;
        $this->reset();

        $this->alert('success', 'Usuario registrado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
            'text' => '',
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
           ]);
    }

    public function render()
    {
        return view('livewire.seguridad.add-user');
    }
}

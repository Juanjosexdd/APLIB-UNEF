<?php

namespace App\Livewire\Seguridad;

use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Configuration\DocumentType;
use App\Models\Configuration\TypeUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Validate;
use App\Models\Security\Statu;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;


class ShowUsers extends Component
{
    use LivewireAlert;
    use WithPagination;

    #[Url]
    public $search = '';

    public $openCreate = false;
    public $openUpdate = false;

    public $sort = 'id';
    public $direction = 'desc';

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

    protected $listeners = ['confirmingDeleteUser'];

    public $confirmingUserDeletion = false;
    public $userIdBeingDeleted;
    public $userIdBeingEdited;
    public $isEditing = false;

    public $document_types = [];
    public $type_users = [];
    public $status = [];
    public $roles = [];

    public function mount()
    {
        $this->document_types = DocumentType::all();
        $this->type_users = TypeUser::all();
        $this->status = Statu::all();
        $this->roles = Role::all();
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
            'email' => 'required|email|unique:users',
            'document_type_id' => 'required',
            'type_user_id' => 'required',
            'status_id' => 'required',
            'identification_card' => 'required|min:6|max:8',
            'password' => 'nullable|confirmed',
            'sex' => 'required|boolean',
        ];
    }

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'sex' => $this->sex,
            'birthdate' => $this->birthdate,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'document_type_id' => $this->document_type_id,
            'type_user_id' => $this->type_user_id,
            'status_id' => $this->status_id,
            'identification_card' => $this->identification_card,
            'password' => $this->password,
        ]);
        // $user->roles()->attach($this->roles);

        $this->openCreate = false;
        $this->reset($user);
        $this->emit('render');
        
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


    public function confirmDeleteUser($userId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->userIdBeingDeleted = $userId;
        $this->confirmingUserDeletion = true;
    }

    public function deleteUser()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        User::find($this->userIdBeingDeleted)->delete();
        $this->confirmingUserDeletion = false;

        $this->alert('success', 'El Usuario se a eliminado satisfactoriamente!', [
            'position' => 'top-end',
            'timer' => '5000',
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '600',
            'text' => '',
        ]);
    }


    public function edit($userId)
    {
        $this->openUpdate = true;
        $this->resetErrorBag();
        $this->resetValidation();

        $user = User::findOrFail($userId);

        $this->userIdBeingEdited = $user->id;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->username = $user->username;
        $this->birthdate = $user->birthdate;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->email = $user->email;
        $this->document_type_id = $user->document_type_id;
        $this->type_user_id = $user->type_user_id;
        $this->status_id = $user->status_id;
        $this->identification_card = $user->identification_card;
        $this->sex = $user->sex;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'username' => 'required|max:32',
            'birthdate' => 'required|date',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'document_type_id' => 'required',
            'type_user_id' => 'required',
            'status_id' => 'required',
            'identification_card' => 'required|min:6|max:8',
            'sex' => 'required|boolean',
            'password' => 'nullable|confirmed', // Cambia la validación de 'required' a 'nullable'
        ]);

        $user = User::findOrFail($this->userIdBeingEdited);

        $user->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'sex' => $this->sex,
            'birthdate' => $this->birthdate,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'document_type_id' => $this->document_type_id,
            'type_user_id' => $this->type_user_id,
            'status_id' => $this->status_id,
            'identification_card' => $this->identification_card,
        ]);

        // Actualizar la contraseña solo si se proporciona una nueva
        if ($this->password) {
            $user->update([
                'password' => $this->password,
            ]);
        }

        $this->isEditing = false;
        $this->openUpdate = false;
        $this->reset();

        $this->alert('success', 'Usuario actualizado satisfactoriamente.', [
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
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(8);

        return view('livewire.seguridad.show-users', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        $this->sort = $sort;
    }
}

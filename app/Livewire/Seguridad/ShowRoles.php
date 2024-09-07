<?php

namespace App\Livewire\Seguridad;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowRoles extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $permissions= [];
    public $open = false;


    public $roleEdit = [
        'id' => null,
        'name' => null,
        'permissions' => [],
    ];


    public $createForm = [
        'name' => null,
        'permissions' => [],
    ];

    public function getPermissions(){
        $this->permissions = Permission::all();
    }

    public function mount()
    {
        $this->getPermissions();
    }

    public function save()
    {
        $role = Role::create([
            'name' => $this->createForm['name']
        ]);

        $role->permissions()->attach($this->createForm['permissions']);

        $this->reset('createForm');
        $this->emit('roleSaved');
    }


    public function edit(Role $role)
    {
        $this->open = true;
        $this->roleEdit['id'] = $role->id;
        $this->roleEdit['name'] = $role->name;
        // $this->roleEdit['permissions'] = $role->permissions->pluck('id')->toArray();
        $this->roleEdit['permissions'] = $role->permissions->pluck('id');

    }

    public function update()
    {
        $role = Role::findOrFail($this->roleEdit['id']);
        $role->update([
            'name' => $this->roleEdit['name']
        ]);

        $role->permissions()->sync($this->roleEdit['permissions']);

        $this->open = false;
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.seguridad.show-roles', compact('roles'));
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

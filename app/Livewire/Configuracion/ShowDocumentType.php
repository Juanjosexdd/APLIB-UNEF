<?php

namespace App\Livewire\Configuracion;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Configuration\DocumentType;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ShowDocumentType extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $openCreate= false;
    public $openEdit= false;
    public $documentTypeId;

    #[Validate]
    public $name ='', $abbreviation ='';
    protected $listeners = ['confirmingDeleteUser'];

    public $confirmingDocumentTypeDeletion = false;
    public $password;

    public function rules()
    {
        return [
            'name' => 'required',
            'abbreviation' => 'required',
        ];
    }

    public function search()
    {
        $this->reset();
    }

    public function create()
    {
        $this->reset();
        $this->openCreate = true;
    }


    public function save()
    {
        $validated = $this->validate();

        DocumentType::create($validated);

        $this->reset();

        $this->openCreate = false;
        $this->alert('success', 'Tipo de documento registrado satisfactoriamente.', [
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

    public function edit(DocumentType $documentType)
    {
        $this->reset();
        $this->documentTypeId = $documentType->id;
        $this->name = $documentType->name;
        $this->abbreviation = $documentType->abbreviation;

        $this->openEdit = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $documentType = DocumentType::find($this->documentTypeId);
        $documentType->update($validated);

        $this->reset();

        $this->alert('success', 'Tipo de documento actualizado satisfactoriamente.', [
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

    public function confirmDeleteDocumentType($documentTypeId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->documentTypeId = $documentTypeId;
        $this->confirmingDocumentTypeDeletion = true;
    }


    public function deleteDocumentType()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('La contraseña no coincide con nuestros registros.'),
            ]);
        }

        $documentType = DocumentType::find($this->documentTypeId);

        // Verificar si hay usuarios asociados
        if ($documentType->users()->exists()) {
            $this->alert('error', 'No se puede eliminar el tipo de documento porque hay usuarios asociados.', [
                'position' => 'top-end',
                'timer' => 4000,
                'toast' => true,
                'width' => '500',
                'timerProgressBar' => true,
            ]);
            return;
        }

        $documentType->delete();

        $this->confirmingDocumentTypeDeletion = false;

        $this->alert('success', 'Tipo de documento eliminado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $document_types = DocumentType::where('name', 'like', '%' . $this->search . '%')
                                    ->orWhere('abbreviation', 'like', '%' . $this->search . '%')
                                    ->orderBy($this->sort, $this->direction)
                                    ->paginate(8);
        return view('livewire.configuracion.show-document-type', compact('document_types'));
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

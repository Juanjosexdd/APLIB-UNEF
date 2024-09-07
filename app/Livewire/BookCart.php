<?php

namespace App\Livewire;

use App\Models\Configuration\Libro;
use Livewire\Component;

class BookCart extends Component
{
    public $cart = [];

    public function addToCart($libroId)
    {
        if (count($this->cart) < 3) {
            if (!in_array($libroId, $this->cart)) {
                $this->cart[] = $libroId;
            }
        } else {
            session()->flash('error', 'No puedes solicitar más de 3 libros.');
        }
    }

    public function removeFromCart($libroId)
    {
        if (($key = array_search($libroId, $this->cart)) !== false) {
            unset($this->cart[$key]);
        }
    }

    public function render()
    {
        return view('livewire.book-cart', [
            'libro' => Libro::whereIn('id', $this->cart)->get(),
        ]);
    }
}

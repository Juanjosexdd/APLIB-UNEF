<?php

namespace App\Http\Controllers;

use App\Models\Configuration\Libro;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->name;

        $libros = Libro::where('titulo', 'LIKE', "%" . $name . "%")
            ->where('status', 2)
            ->paginate(8);

        return view('search', compact('libros'));
    }
}

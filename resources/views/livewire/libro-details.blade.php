<div>
    <section class="bg-blue-800 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ asset('img/books.png') }}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$libro->titulo}}</h1>
                <h2 class="text-xl mb-3">{{$libro->autor}}</h2>
                <p class="mb-2"> <i class="fas fa-chart-line"></i> Carrera: {{$libro->carrera->nombre}}</p>
                <p class="mb-2"> <i class="fas fa-users"></i> Categoria: {{$libro->subcategoria->categoria->nombre}}</p>
                <p class="mb-2"> <i class="far fa-star"></i> Subcategoria: {{$libro->subcategoria->nombre}}</p>
                {{-- <p>Calificación: {{$libro->rating}}</p> --}}
            </div>
        </div>
    </section>
</div>

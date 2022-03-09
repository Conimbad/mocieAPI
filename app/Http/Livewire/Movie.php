<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Movie extends Component {
    protected $listeners = ['searchMovie'=>'showMovie'];

    // variable que almacena el resultado de solicitud a la API
    public $api;
    // id de pelicula
    public $idMovie;
    // Muestra las peliculas individualmente
    public function showMovie(String $movieName) {
        $this->api = Http::get('http://www.omdbapi.com/?s='.$movieName.'&r=json&type=movie&apikey=dcec297d');
        $this->api = $this->api->json();
    }
    // Obtiene las propiedades de la pelicula
    public function getMovieId($movie) {
        $this->idMovie = $movie;
        $this->emit('addFavorite', $this->idMovie);

    }

    public function render() {
        return view('livewire.movie');
    }
}

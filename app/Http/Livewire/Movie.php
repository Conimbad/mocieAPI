<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Favorite;

class Movie extends Component {
    protected $listeners = ['searchMovie'=>'showMovie','added'=>'showAdded','noAdded'=>'showNoAdded'];
    
    // guarda id de pelicula
    public $added;
    public $alertColor;
    public $textColor;

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
    // Mostrando alert si se agrega correctamente la pelicula
    public function showAdded() {
        $this->textColor = 'text-green-700';
        $this->alertColor = 'bg-green-700';
        session()->flash('message', 'Movie added correctly');
    }
    public function showNoAdded() {
        $this->textColor = 'text-red-700';
        $this->alertColor = 'bg-red-100';
        session()->flash('message', 'Movie exist in favorites');
    }

    public function render() {
        return view('livewire.movie');
    }
}

<?php

namespace App\Http\Livewire;
use App\Models\Favorite;

use Livewire\Component;



class Favorites extends Component
{
    public $message = 'Added caorrectly';
    //Listener del evento mandado en el controlador Movie
    protected $listeners = ['addFavorite'=>'saveMovie'];
    // 
    public $saveIdMovie;
    public $favorites;

    public function saveMovie($movie) {
        $favorite = new Favorite;
        // Obteniendo id de usuario activo
        $user = auth()->user();
        $userId = $user->id;
        // Datos de la pelicula
        $this->saveIdMovie = $movie;
        $favorite->id_movie = $this->saveIdMovie['imdbID']; 
        $favorite->img = $this->saveIdMovie['Poster'];
        $favorite->title = $this->saveIdMovie['Title'];
        $favorite->year = $this->saveIdMovie['Year'];
        $favorite->id_user = $userId;
        $favorite->save();
        return $this->message;
        
    }

    public function retrievingMovie() {
        $favorite = new Favorite;
        $this->idMovie = $favorite->all();
    }
    public function removeMovie($id) {
        $favoriteId = new Favorite;
        $favoriteId->destroy($id);
    }
    public function render() {
        $this->favorites = Favorite::all();
        return view('livewire.favorites');
    }
}

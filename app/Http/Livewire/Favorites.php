<?php

namespace App\Http\Livewire;
use App\Models\Favorite;

use Livewire\Component;



class Favorites extends Component
{
    //Listener del evento mandado en el controlador Movie
    protected $listeners = ['addFavorite'=>'saveMovie'];
    // 
    public $saveIdMovie;
    public $favorites;
    public $idMovieToFind;
    public $userId;
    public function saveMovie($movie) {
        $favorite = new Favorite;
        // Obteniendo id de usuario activo
        $user = auth()->user();
        $this->userId = $user->id;
        // Datos de la pelicula
        $this->saveIdMovie = $movie;
        $this->idMovieToFind = $this->saveIdMovie['imdbID'];
        if($favorite->firstWhere('id_movie', $this->idMovieToFind) != null) {
            $this->emit('noAdded');           
        }else {
            $favorite->firstOrNew([
                'id_movie' => $this->saveIdMovie['imdbID'],
                'img' => $this->saveIdMovie['Poster'],
                'title' => $this->saveIdMovie['Title'],
                'year' => $this->saveIdMovie['Year'],
                'id_user' => $this->userId,
            ])->save();
            $this->emit('added');
        }
    }

    public function retrievingMovie() {
        $favorite = new Favorite;
        $this->idMovie = $favorite->all();
    }
    public function removeMovie($id) {
        $favoriteId = new Favorite;
        $favoriteId->destroy($id);
        session()->flash('message', 'Movie deleted');
    }
    public function render() {
        $user = auth()->user();
        $userId = $user->id;
        $this->favorites = Favorite::where('id_user', $userId)->get();
        return view('livewire.favorites');
    }
}

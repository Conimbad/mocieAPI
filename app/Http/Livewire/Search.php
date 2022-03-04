<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Array_;

class Search extends Component
{  
    public $name;
    public $movie;
    public $result;

    public function favoriteMovie() {
        
    }

    public function search() {
        $this->movie = $this->name;
        $this->result = Http::get('http://www.omdbapi.com/?s='.$this->movie.'&r=json&type=movie&apikey=dcec297d');
        $this->result = $this->result->json();
    }
    public function render()
    {
        return view('livewire.search');
    }
}

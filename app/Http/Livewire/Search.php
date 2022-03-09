<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\Favorites;
use App\Models\User;
class Search extends Component
{  
    public $movieName;
    public function search() {
        $this->emit('searchMovie', $this->movieName);
        
        /* $this->result = Http::get('http://www.omdbapi.com/?s='.$this->movieName.'&r=json&type=movie&apikey=dcec297d');
        $this->result = $this->result->json(); */
       
    }
    public function render()
    {
        return view('livewire.search');
    }
}

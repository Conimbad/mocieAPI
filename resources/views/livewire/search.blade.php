<form wire:submit.prevent="search">
    <div class="grid grid-cols-3 gap-4">
          <div class="col-span-2">
            <input wire:model="name" id="movie" type="text" placeholder="Type your movie..." class="w-full" required='required'> 
          </div>
          <div>
            <input type="submit" value="Serach" class="cursor-pointer w-full text-lg text-white-700  text-lg text-white-700 py-2 font-semibold text-sm bg-rose-500 text-white rounded-none shadow-sm">
          </div>
          
    </div>
    @if($result != null)
              {{-- <h1>{{ var_dump($result['Search']) }}</h1> --}}
              {{-- <h1>Total results: {{ $result['totalResults'] }}</h1> --}}
                  
                <div class="grid grid-cols-6 gap-4 mt-4 justify-center">
                  @foreach ($result['Search'] as $item)
                    <div>
                      <img src="{{ $item['Poster'] }}" alt="">
                      <h3 class="text-xl">Title: {{ $item['Title'] }}</h3>
                      <h2>Year: {{ $item['Year'] }}</h2>
                      <input type="hiden" id="{{$item['imdbID']}}">
                      {{-- <h2>Rated: {{ $item['Rated'] }}</h2> --}}
                      <button wire:click="favoriteMovie" class="text-lg text-white-700  px-4 py-2 font-semibold text-sm bg-orange-500 text-white rounded-none shadow-sm">Add favorite</button>
                    </div>
                  @endforeach
                </div>

                
    @endif
</form>
  
  
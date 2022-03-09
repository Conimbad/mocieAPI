<div class="mt-4">
  <h1>This is the Movie component</h1>
  @if($api != null)

  {{-- {{var_dump($api)}} --}}
  <div class="grid grid-cols-6 gap-4 mt-4 justify-center">
    
    @foreach($api['Search'] as $movie)
    
    <div>
      <img src="{{ $movie['Poster'] }}" alt="{{ $movie['Title'] }}">
      <h3 class="text-xl">Title: {{ $movie['Title'] }}</h3>
      <h2>Year: {{ $movie['Year'] }}</h2>
      
      <button class="cursor-pointer text-lg text-white-700  px-4 py-2 font-semibold text-sm bg-orange-500 text-white rounded-none shadow-sm"
        wire:click.prevent="getMovieId({{json_encode($movie)}})"  
      >
        Add favorites
      </button>
    </div>
        
    @endforeach
  </div>
  @endif
</div>

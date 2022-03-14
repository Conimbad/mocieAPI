<div class="mt-4">
  <h1>This is the Movie component</h1>
  @if(session()->has('message'))
    <div class="flex {{ $alertColor }} rounded-lg pt-2 mb-4 text-sm justify-center {{ $textColor }} h-12" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium text-lg">{{session('message')}}</span>
        </div>
    </div>
  @endif
  
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

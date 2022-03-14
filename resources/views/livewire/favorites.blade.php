<div>
    {{-- <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium"> {{$message}} </span>
        </div>
    </div> --}}
    @if(session()->has('message'))
        <div class="flex bg-red-100 rounded-lg pt-4 mb-4 text-sm justify-center text-red-700 h-12" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium text-lg">{{session('message')}}</span>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-6 gap-x-8 gap-y-4 justify-center ml-4 mt-6">
    
        @foreach($favorites as $favorite)
        
            <div class="mt-4">
                <img src="{{ $favorite->img }}" alt="{{ $favorite->title }}">
                <h3 class="text-xl">Title: {{ $favorite->title }}</h3>
                <h2>Year: {{ $favorite->year }}</h2>
                
                <button class="cursor-pointer text-lg text-white-700  px-4 py-2 font-semibold text-sm bg-red-600 text-white rounded-none shadow-sm"
                    wire:click.prevent="removeMovie({{$favorite->id}})"  
                >
                    Remove to favorite
                </button>
            </div>
            
        @endforeach
    </div>
    
</div>

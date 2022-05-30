<div>
    @if($errors->has($key))
        @foreach($errors->get($key) as $errorMessage)
            <p class="mt-2 font-thin text-red-600">
                {{ $errorMessage }}
            </p>
        @endforeach
    @endif</div>

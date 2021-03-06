<div>
    @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-600 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{!! Session::get('success') !!}</span>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{!! Session::get('error') !!}</span>
        </div>
    @endif
    @if(Session::has('info'))
        <div class="bg-yellow-100 border border-yellow-400 text-amber-600 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{!! Session::get('info') !!}</span>
        </div>
    @endif
</div>

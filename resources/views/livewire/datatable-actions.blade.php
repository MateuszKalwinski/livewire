<div>
    <div class="flex space-x-1 justify-around">
        <a href="{{ route('show', $id) }}"
           class="p-1 text-indigo-600">
            {{__('Show')}}
        </a>
        <a href="{{ route('edit', $id) }}"
           class="p-1 text-amber-600">
            {{__('Edit')}}
        </a>
        <form method="POST" action="{{route('destroy', $id)}}">
            @method('DELETE')
            @csrf
            <button type="submit"
               class="p-1 text-red-600">
                {{__('Delete')}}
            </button>
        </form>
    </div>
</div>

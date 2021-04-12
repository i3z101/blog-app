<input
    type="{{$type}}"
    name="{{$name}}"
    placeholder="{{$placeholder}}"
    @if($class == 'hidden')
    class="hidden bg-transparent mt-5"
    @else
    class="w-4/5 outline-none border-b-1 placeholder-gray-300 bg-transparent px-10 py-5 border-b border-gray-600 mb-5"
    @endif
    />
@if(intval($id)<=0)
<a href="/blog" class="bg-blue-500 text-sm uppercase text-white rounded-full hover:bg-blue-700 transition-all duration-300 p-4 font-sans block w-2/3 md:w-1/2 text-center font-bold">{{$btnText}}</a>
@else
<a href="/blog/{{$id}}" class="bg-blue-500 text-sm uppercase text-white rounded-full hover:bg-blue-700 transition-all duration-300 p-4 font-sans block w-2/3 md:w-1/2 text-center font-bold">{{$btnText}}</a>
@endif
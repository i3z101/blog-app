@extends('layouts.app')

@foreach ($post as $p)

@section('title', $p->title)


@section('show')


<div class="flex flex-col justify-center items-center">
    <div class="border-b border-gray-800 mb-2">
        @include('reusable.headerTitle', ['title'=>$p->title])
        <p class="text-gray-600 text-center -mt-8 text-lg p-2">By <span class="font-bold">{{$p->user->name}}</span>, {{date('jS M Y', strtotime($p->created_at))}} </p>
    </div>
  
    <img src="{{asset('images/'. $p->image_path)}}" width="800" />

    <div class="mt-5 md:w-4/5 border-t border-gray-800 p-5">
        <p> {{$p->body}}</p>
    </div>

    @if(Auth::check() && Auth::user()->id == $p->user_id )
    <div class="flex flex-row justify-center items-center w-4/5 md:w-1/2 mt-5 md:ml-1/3">
        <a href="/blog/{{$p->id}}/edit" class="bg-green-500 text-sm uppercase text-white rounded-full hover:bg-green-700 transition-all duration-300 p-4 font-sans block w-full md:w-40  text-center font-bold">Update post</a>
        <form action="/blog/{{$p->id}}" method="POST" class="w-full">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-sm uppercase text-white rounded-full hover:bg-red-700 transition-all duration-300 p-4 font-sans block w-full md:w-40  text-center font-bold ml-2">
            delete post
         </button>
        
        </form>
        @endif
        
    
    </div>
   
</div>



    
@endforeach

@endsection
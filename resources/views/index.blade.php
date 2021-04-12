@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!--Parent-->
<section>

    <div class="background-img py-20  flex justify-center items-center flex-col">

        <h2 class="text-white text-xl md:text-4xl text-center font-bold font-serif mb-10">Need to become a better developer?</h2>
        <a href="/blog" class="bg-white text-sm uppercase text-gray-700 rounded-md hover:bg-gray-700 hover:text-white transition-all duration-300 p-4 font-sans">Read more</a>

    </div>


    @include('reusable.blogData', [
        'img' => $post->image_path,
        'postTitle' => $post->title,
        'postBrief' => $post->body,
        'btnText' => 'Find out more',
        'extra' => '',
        'creator' => $post->user->name,
        'date' => $post->created_at,
        'id' => $post->id
    ])
  


</section>

<section class="flex flex-col justify-center items-center mt-20 md:mt-0">
    <h2 class="text-gray-800 text-3xl font-serif font-bold">Recent posts</h2>
    <hr class="border-b-2">
    <div class="grid grid-cols-1 md:grid-cols-2 w-4/5 mt-10">

        <div class="p-7 bg-yellow-700">
            <span class="text-sm text-white font-medium">{{$post->title}}</span>
            <p class="mt-5 md:text-lg text-white font-light">
                {{$post->body}}
            </p>
            <a href="/blog/{{$post->id}}" class="text-sm uppercase text-white rounded-full mt-15 border-solid border-2 hover:bg-yellow-600 border-white transition-all duration-300 p-4 font-sans block w-2/3 md:w-1/2 text-center font-bold">Find out more</a>
        </div>
        <img src="{{asset('images/' . $post->image_path)}}"  width="700"/>
    </div>
</section>




@endsection


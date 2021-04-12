@extends('layouts.app')


@section('title', 'Blog')

@section('blog')

<!-- parent -->

<div id="indexId">



   @include('reusable.headerTitle', ['title'=>'blog posts'])

   @if(session()->has('message'))
   <div class="w-1/2 m-auto bg-green-500 p-5 rounded-lg text-center" id="success">
            <span class="text-white p-5">{{session()->get('message')}}</span>
       </div>
   @endif

    @if(Auth::check())
    <div class="m-auto px-20 md:px-48">
        <a href="/blog/create" class="bg-blue-500 text-sm uppercase text-white rounded-full hover:bg-blue-700 transition-all duration-300 p-4 font-sans w-full md:w-40 text-center font-bold">Create a post</a>
    </div>
    @endif

    @forelse ($posts as $post)
    @include('reusable.blogData', [
        'img' => $post->image_path,
        'postTitle' => $post->title,
        'postBrief' => $post->body,
        'btnText' => 'Keep reading',
        'creator' =>  $post->user->name,
        'date' => $post->created_at,
        'id' => $post->id
    ])

        
    @empty
    <div class="w-1/2 m-auto bg-blue-500 p-5 rounded-lg text-center">
        <span class="text-white p-5">Sorry no posts are published yet</span>
   </div>
    @endforelse

    

</div>

@endsection
@extends('layouts.app')

@section('title', 'edit')

@foreach ($post as $p)


@section('edit')


<div class="ml-96">
    @include('reusable.form', ['edit' => true, 'bodyVal' => $p->body, 'titleVal' => $p->title , 'id' => $p->id ,'buttonText' => 'Edit a post'])
</div>
<div class="w-1/2 m-auto">
    @if($errors->any())
    <div class="mt-5">
        <ul class="list-none">
            @foreach ($errors->all() as $error)
                <li class="bg-red-600 text-white p-5 mb-5 rounded-md">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

@endsection

@endforeach
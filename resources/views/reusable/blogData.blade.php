<div class="grid grid-cols-1 md:grid-cols-2 w-4/5 md:p-10 mt-10 m-auto">
    <img src="{{asset('images/'. $img)}}"  width="300"/>
    <div class="md:p-10">
        <h2 class="text-gray-700 text-lg md:text-3xl font-bold text-center">{{$postTitle}}</h2>
        <p class="text-gray-600 mt-4 text-center">By <span class="font-bold">{{$creator}}</span>, {{date('jS M Y', strtotime($date))}} </p>
        <p class="text-lg text-gray-500 font-sans text-center mb-5 mt-5 w-full">{{$postBrief}}</p>
        
        @include('reusable.button', ['btnText'=>$btnText, 'id' => $id])

    </div>
</div>

@if(!$edit)
<form action="/blog" method="POST" enctype="multipart/form-data" class="px-32">
    @csrf
    <input
        type="text"
        name="title"
        placeholder="post title"
        class="border-b border-gray-600 outline-none bg-transparent p-5 w-1/2"
    />

    <textarea 
    name="body" 
    cols="10" 
    rows="5" 
    maxlength="200" 
    placeholder="body post" 
    class="border-b border-gray-600 outline-none bg-transparent p-5 w-1/2 resize-none"
    ></textarea>

     <div class="bg-white rounded-md shadow-lg justify-center text-center w-1/3 mt-8 ml-15">
        <label class="flex flex-col tracking-wide cursor-pointer p-3">
            <span class="text-gray-800 font-semibold text-sm uppercase">
                select an image
            </span>
            <input type="file" class="hidden" name="image"/>
        </label>
    </div>

   
    <div class="mt-10">
        <button type="submit" class="bg-blue-500 text-sm uppercase text-white rounded-full hover:bg-blue-700 transition-all duration-300 p-4 font-sans block w-2/3 md:w-1/2 text-center font-bold">
           {{$buttonText}}
        </button>
    </div>
   
</form>
@else

<form action="/blog/{{$id}}" method="POST" enctype="multipart/form-data" class="px-32">
    @csrf
    @method("PUT")
    <input
        type="text"
        name="title"
        placeholder="post title"
        class="border-b border-gray-600 outline-none bg-transparent p-5 w-1/2"
        value= "{{$titleVal}}"
    />

    <textarea 
    name="body" 
    cols="10" 
    rows="5" 
    maxlength="200" 
    placeholder="body post" 
    class="border-b border-gray-600 outline-none bg-transparent p-5 w-1/2 resize-none"
    >{{trim($bodyVal)}}</textarea>

     <div class="bg-white rounded-md shadow-lg justify-center text-center w-1/3 mt-8 ml-15">
        <label class="flex flex-col tracking-wide cursor-pointer p-3">
            <span class="text-gray-800 font-semibold text-sm uppercase">
                select an image
            </span>
            <input type="file" class="hidden" name="image"/>
        </label>
    </div>

   
    <div class="mt-10">
        <button type="submit" class="bg-blue-500 text-sm uppercase text-white rounded-full hover:bg-blue-700 transition-all duration-300 p-4 font-sans block w-2/3 md:w-1/2 text-center font-bold">
           {{$buttonText}}
        </button>
    </div>
   
</form>


@endif
    
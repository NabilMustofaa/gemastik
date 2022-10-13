@extends('layouts.main2')
@section('content')
<div class=" h-[85vh] mx-12 my-4">
    <form action="/partner" method="POST" class="h-full" enctype="multipart/form-data">
    @csrf
        <div class="flex h-full">
            <div class="w-1/2 h-full justify-center align-middle">

                <div class="flex flex-col items-center justify-center w-full">
                    <img src="" alt="" class="w-60 img-preview">
                    <label class="flex flex-col w-40 h-40 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300 my-auto">
                        
                        <input type="file" id="image" name="image" class="opacity-0" onchange="previewImage()" />
                        <div class="flex flex-col items-center justify-center pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="pt-1 text-sm tracking-wider text-center text-gray-400 group-hover:text-gray-600">
                                Click Here to Upload
                            </p>
                            @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </label>
                </div>
            </div>
            <div class=" w-1/2 bg-white rounded-xl shadow-md flex flex-col py-12 pl-6 ">
                <div class="flex flex-col pr-6 overflow-auto">
                    <label for="name" class="text-sm font-semibold text-gray-600 py-2">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" value="{{ Auth::user()->name }}" />
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                    <label for="birth_date" class="text-sm font-semibold text-gray-600 py-2">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" placeholder="Enter your birthDate" class="border rounded-lg px-3 py-5 mt-1 mb-5 text-sm w-full" />
                    @error('birth_date')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="location" class="text-sm font-semibold text-gray-600 py-2">Location</label>
                    <input type="text" name="location" id="location" placeholder="Enter your location" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                    @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="description" class="text-sm font-semibold text-gray-600 py-2">Description</label>
                    <div class="h-80">
                        <textarea name="description" id="description" placeholder="Enter your description" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full h-64" rows="5"></textarea>
                    </div>
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                    <label  for="category" class="text-sm font-semibold text-gray-600 py-2">Category</label>
                    <input type="hidden" name="totalCategory" id="totalCategory" value="0">
                    <div id="categoryLabel" class="flex">

                    </div>
                    {{-- input with button --}}
                    <div class="flex flex-row">
                        <input type="text" name="category" id="category" placeholder="Enter your category" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        <button id="categoryButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4  mt-1 mb-5 rounded" type="button">
                            Add
                        </button>
                    </div>

                    {{-- connect instagram --}}
                    <label for="instagram_url" class="text-sm font-semibold text-gray-600 py-2">Instagram</label>
                    <div class="flex flex-row ">
                        <input type="url" name="instagram_url" id="instagram_url" placeholder="Enter your instagram" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                    </div>
                    @error('instagram_url')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                    {{-- connect facebook --}}

                    <div class="flex flex-row w-full">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-1 mb-5 w-full">
                            Submit
                        </button>
                    </div>

                    
                </div>
            </div>
        </div>
    </form>
        
        
</div>
<script>
    // function addCategory(){
    //     console.log("addCategory");
    //     var category = document.getElementById("category").value;
    //     console.log(category);
    //     var span = document.createElement("span");
    //     span.className = "items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mx-2 w-fit";
    //     span.innerHTML = category;
    //     var label= document.getElementById("categoryLabel");
    //     label.appendChild(span);
    // }

    
    function previewImage() {
        const image= document.querySelector('#image')
        const imgPreview =document.querySelector('.img-preview')
        imgPreview.style.display='flex'
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
<script src="{{ asset('js/partner.js') }}"></script>
@endsection
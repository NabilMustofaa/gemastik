@extends('layouts.main2')
@section('content')
<div class="bg-white rounded-2xl mx-12 my-4">
    <div class="flex justify-between border-b px-4 pb-8 border-gray-100">
        <div class=" w-5/12 h-[85vh] flex flex-col pt-16  align-middle justify-center">
            <img src="{{ asset('/storage/'.$partner->image) }}" alt="" class=" 2xl:w-96 2xl:h-96 w-80 h-80 mx-auto shadow-2xl rounded-sm">
            {{-- <div class=" flex justify-between pt-4 mx-24 2xl:mx-36">
                <img src="{{ asset('img/profile.png') }}" alt="" class=" 2xl:w-24 2xl:h-24 w-20 h-20 shadow-2xl rounded-sm">
                <img src="{{ asset('img/profile.png') }}" alt="" class=" 2xl:w-24 2xl:h-24 w-20 h-20 shadow-2xl rounded-sm">
                <img src="{{ asset('img/profile.png') }}" alt="" class=" 2xl:w-24 2xl:h-24 w-20 h-20 shadow-2xl rounded-sm">
            </div> --}}
        </div>
        <div class="w-7/12 pt-16 flex flex-col justify-center align-middle pr-40">
            <h2 class=" text-2xl font-bold"> Client Portofolio </h2>
            <h5 class=" text-base my-0.5 font-semibold">Nama : {{ $partner->name }}</h5>
            @php
                // count age
                $date = new DateTime($partner->birth_date);
                $now = new DateTime();
                $interval = $now->diff($date);
                $age = $interval->y;
            @endphp 
            <h5 class=" text-base my-0.5 font-semibold">Umur : {{ $age }} </h5>
            <h5 class=" text-base my-0.5 font-semibold">Lokasi : {{ $partner->location }} </h5>
            <p class=" my-2">{{ $partner->description }}</p>
    
            <h4 class=" text-lage font-semibold mt-2">Bidang Profesi dan Keahlian</h4>
            <div class=" flex flex-wrap">
                @foreach ($tags as $tag)
                <div class="bg-white shadow-md bg-opacity-70 backdrop-opacity-5 rounded-full px-4 py-1 mr-2 mt-2 flex justify-between align-middle">
                    <div class="h-2 w-2 bg-black rounded-full mr-2 my-2"></div>
                    <p class=" text-base">{{ $tag->category->name }}</p>
                </div>
                @endforeach

                
            </div>
            <h4 class=" text-lage font-semibold mt-2">Sosial Media</h4>
            <div>
                <div class="bg-white shadow-md bg-opacity-70 backdrop-opacity-5 rounded-lg px-4 py-2 mr-2 mt-2 flex flex-col align-middle">
                    <a class=" text-base mt-1 unde" href="{{ $partner->instagram_url }}">Instagram : <span class="underline">{{ Str::substr($partner->instagram_url, 26, Str::length($partner->instagram_url)-27)  }}</span></a>
                    {{-- <div class="flex justify-between align-middle my-1">
                        <p class=" text-base mt-1">Follower : 24.4M</p>
                    </div> --}}
                </div>
                {{-- <div class="bg-white shadow-md bg-opacity-70 backdrop-opacity-5 rounded-lg px-4 py-2 mr-2 mt-2 flex flex-col align-middle">
                    <p class=" text-base">Youtube : @hansohee</p>
                    <div class="flex justify-between">
                        <p class=" text-base mt-1">Follower : 24.4M</p>
                    </div>    
                </div> --}}
            </div>
            
            @auth
            @if ($partner->user_id != Auth::user()->id)
            <h4 class=" text-lage font-semibold my-2">Know your client more</h4>  
            <a href="/chat/{{ $partner->user_id }}" class=" py-2 px-4 text-lg text-zinc-100 w-fit bg-gray-500 rounded-full">Contact Here</a>
            @endif
            @endauth
            
        </div>
    </div>
    <div class="flex flex-row-reverse justify-between py-10">
        <img src="{{ asset('img/profile.png') }}" alt="" class=" w-80 h-80 mr-12">
        <div class=" flex flex-col w-3/5 mx-24">
            <h2 class=" text-2xl font-bold"> Rama Aditya</h2>
            <p class=" text-base text-justify">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente sed quas pariatur doloremque asperiores ad totam nemo illum fugiat! Asperiores tempore accusamus rerum maiores sed enim, hic molestiae illum error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quae fugiat eveniet officiis error corrupti! Odio, deserunt provident consequatur ipsa cum adipisci qui ducimus mollitia dolor magnam. Molestias, aliquid repudiandae.
            </p>
        </div>
    </div>
    <div class="flex justify-between py-10">
        <img src="{{ asset('img/profile.png') }}" alt="" class=" w-80 h-80 ml-24">
        <div class=" flex flex-col w-3/5 mx-12">
            <h2 class=" text-2xl font-bold"> Rama Aditya</h2>
            <p class=" text-base text-justify">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente sed quas pariatur doloremque asperiores ad totam nemo illum fugiat! Asperiores tempore accusamus rerum maiores sed enim, hic molestiae illum error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quae fugiat eveniet officiis error corrupti! Odio, deserunt provident consequatur ipsa cum adipisci qui ducimus mollitia dolor magnam. Molestias, aliquid repudiandae.
            </p>
    
        </div>
    </div>
</div>
@endsection
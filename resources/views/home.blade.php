
@extends('layouts.main2')
@section('content')
    <div class="flex justify-center align-middle mt-6">
        <img class="mx-5 w-96 h-24" src="{{ asset('img/banner.jpg') }}" alt="">
        <img class="mx-5 w-96 h-24" src="{{ asset('img/banner.jpg') }}" alt="">
        <img class="mx-5 w-96 h-24" src="{{ asset('img/banner.jpg') }}" alt="">
    </div>

    <div class="mx-20">
        <h2 class="font-bold text-xl mt-6">Top Model This Week</h2>
        <div class="flex align-middle justify-center mt-2 flex-wrap">
            @for ($i = 0; $i < 6;$i++)
            
            <a class="mx-auto hover:scale-110 my-3" href="{{ '/partner/'.$partners1[$i]->id }}">
                <img class=" transition-all transform 2xl:h-56 2xl:w-56 w-40 h-40   shadow-xl border border-gray-100 rounded-md p-0" src="{{asset('/storage/'.$partners1[$i]->image) }}" alt="">
                <div class="bg-white flex bg-opacity-70 backdrop-opacity-5 text-[0.6rem] 2xl:text-xs  w-fit font-semibold rounded-full px-2 py-1 -mt-[2rem] ml-2">
                    <span> {{ $partners1[$i]->user->tagPartners[0]->category->name }}</span>
                </div>
            </a>
            @endfor
        </div>
        <h2 class="font-bold text-xl mt-6">New Model This Week</h2>
        <div class="flex align-middle justify-center mt-2 flex-wrap">
            @for ($i = 0; $i < 6;$i++)
           
            <a class="mx-auto hover:scale-110 my-3" href="{{ '/partner/'.$partners2[$i]->id }}">
                <img class=" transition-all transform 2xl:h-56 2xl:w-56 w-40 h-40   shadow-xl border border-gray-100 rounded-md p-0" src="{{asset('/storage/'.$partners2[$i]->image) }}" alt="">
                <div class="bg-white flex bg-opacity-70 backdrop-opacity-5 text-[0.6rem] 2xl:text-xs  w-fit font-semibold rounded-full px-2 py-1 -mt-[2rem] ml-2">
                    <span> {{ $partners2[$i]->user->tagPartners[0]->category->name }}</span>
                </div>
            </a>
            @endfor
        </div>
    </div>

    
@endsection    
@extends('layouts.main2')
@section('content')
    <div class="flex justify-center align-middle mt-6">
        <h1 class="text-5xl"> Category {{ $name }} </h1>
    </div>

    <div class="mx-20">
        <div class="flex align-middle justify-center mt-2 flex-wrap">
            @php
                $partnerArray= array();
            @endphp
            @foreach ($partners as $partner)
                
                @if (in_array($partner->user_id, $partnerArray))
                @continue
                @else
                <a class="mx-auto hover:scale-110 my-3" href="{{ '/partner/'.$partner->user->partner->id }}">
                    <img class=" transition-all transform 2xl:h-56 2xl:w-56 w-40 h-40   shadow-xl border border-gray-100 rounded-md p-0" src="{{asset('/storage/'.$partner->user->partner->image) }}" alt="">
                    <div class="bg-white flex bg-opacity-70 backdrop-opacity-5 text-[0.6rem] 2xl:text-xs  w-fit font-semibold rounded-full px-2 py-1 -mt-[2rem] ml-2">
                        {{ $partner->user->tagPartners[0]->category->name }}
                    </div>
                </a>
                @endif
                @php
                    $partnerArray[] = $partner->user_id;
                @endphp
                
            @endforeach
        </div>
    </div>

        
@endsection
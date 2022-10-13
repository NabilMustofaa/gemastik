@extends('layouts.chat')
@section('content')
    <div class="h-[90vh] w-screen py-5 px-12">
        <div class="flex bg-white shadow-xl rounded-2xl h-[87vh]">
            
            <div class=" w-full">
                <div class=" flex flex-col h-full">
                    <div class=" flex justify-between h-16 items-center py-2 px-4 border-b border-gray-100">
                        <div class=" flex items-center">
                            @if ($receiver->partner()->exists())
                            <img src="{{ asset('/storage/'.$receiver->partner->image) }}" alt="" class="h-8 w-8 rounded-full my-1">
                            @else
                            <img src="{{ asset('img/profile.png') }}" alt="" class="h-8 w-8 rounded-full my-1 mx-2">
                            @endif
                            <div class=" flex flex-col ml-2">
                                @if ($receiver->partner()->exists())
                                <h3 class=" text-base font-semibold"> {{ $receiver->partner->name}} </h3>
                                @else
                                <h3 class=" text-base font-semibold"> {{ $receiver->name }} </h3>
                                @endif

                                <input type="hidden" id="message-receiver" value="{{ $receiver->id }}">
                            </div>
                        </div>
                        @if ($receiver->partner()->exists())
                            @if ($aggrement == null || $aggrement->status == 'finished')
                                <div class=" flex items-center">
                                    <button id="aggrement" class=" bg-pink-300 text-white px-4 py-2 rounded-full"> Make Aggrement</button>
                                </div>
                            @endif
                        @endif
                        
                    </div>
                    
                        @if ($aggrement != null && $aggrement->status != 'finished')
                        <div class="w-full h-24 flex justify-between border-b border-gray-100 px-6">
                            <div>
                                <h3 class="text-base font-semibold">{{ $aggrement['title'] }}</h3>
                                <h4 class="text-sm">{{ $aggrement['price'] }}</h4>
                                <a href="{{ asset('/storage/'.$aggrement['file_path']) }}" class="text-sm underline">Check Document</a>
                            </div>
                            @if ($aggrement->status == 'negotiation')
                                @if ($aggrement['negotiation_position_client'] == 1 && $aggrement['receiver_id'] == Auth::user()->id)
                                <div class="flex py-4">
                                    <button class="px-4 py-2 rounded-full border border-pink-400 mr-2" id="counterButton"> Counter</button>
                                    <form action="/aggrement/accept/{{ $aggrement->id }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        @method('PUT')
                                        <button class=" rounded-full bg-pink-400 text-white" type="submit"> Accept</button>
                                    </form>
                                    
                                </div>
                                @elseif ($aggrement['negotiation_position_client'] == 0 && $aggrement['sender_id'] == Auth::user()->id)
                                <div class="flex py-4">
                                    <button class="px-3 py-1 rounded-full border border-pink-400 mr-2" id="counterButton"> Counter</button>
                                    <form action="/aggrement/accept/{{ $aggrement->id }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        @method('PUT')
                                        <button class="px-4 py-2 rounded-full bg-pink-400 text-white" type="submit"> Accept</button>
                                    </form>
                                </div>
                                @else
                                    <div class="flex py-4">
                                        <p class="px-3 py-1"> Waiting Response</p>
                                    </div>
                                @endif
                            @elseif ($aggrement->status == 'accepted')
                                @if ($aggrement['receiver_id'] == Auth::user()->id)
                                <div class="flex py-4">
                                    <p class="px-3 py-1"> Accepted</p>
                                </div>
                                @else
                                <form action="/aggrement/finish/{{ $aggrement->id }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('PUT')
                                    <button class="px-4 py-2 rounded-full bg-pink-400 text-white" type="submit"> Finish</button>
                                </form>
                                @endif
                                
                            @endif
                        </div>    
                        @endif


                        
                    
                    <div id="message-scroll" class=" flex flex-col h-full overflow-auto">
                        <div class=" flex flex-col h-full" id="message-div">
                            
                            <div>
                                <div class=" flex justify-start items-center py-2 px-4">
                                    <div class=" flex flex-col items-start">
                                        <h3 class=" text-xs text-white bg-pink-400 rounded-md px-4 py-2 text-justify mx-20"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam in error voluptates nemo dolorem, magnam exercitationem, accusamus, aliquid dicta distinctio sunt harum sit pariatur aperiam iste magni atque nobis cupiditate</h3>
                                        
                                    </div>
                                </div>
                            </div>
                            @foreach ($messages as $message)
                                @if ($message->sender_id == Auth::user()->id)
                                <div class=" flex justify-end items-center py-2 px-4">
                                    <div class=" flex flex-col items-end">
                                        <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">{{ $message->message }}</h3>
                                        <h3 class=" text-xs text-gray-500"> 12:00 </h3>
                                    </div>
                                </div>
                                @elseif ($message->receiver_id==$receiver->id)
                                <div class=" flex justify-start items-center py-2 px-4">
                                    <div class=" flex flex-col items-start">
                                        <h3 class=" text-xs text-white bg-pink-200 rounded-md px-4 py-2">{{ $message->message }}</h3>
                                        <h3 class=" text-xs text-gray-500"> 12:00 </h3>
                                    </div>
                                </div>
                                @elseif ($message->receiver_id==Auth::user()->id)
                                <div class=" flex justify-start items-center py-2 px-4">
                                    <div class=" flex flex-col items-start">
                                        <h3 class=" text-xs text-white bg-pink-200 rounded-md px-4 py-2">{{ $message->message }}</h3>
                                        <h3 class=" text-xs text-gray-500"> 12:00 </h3>
                                    </div>
                                </div>
                                @elseif ($message->sender_id == Auth::user()->id)
                                <div class=" flex justify-end items-center py-2 px-4">
                                    <div class=" flex flex-col items-end">
                                        <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">{{ $message->message }}</h3>
                                        <h3 class=" text-xs text-gray-500"> 12:00 </h3>
                                    </div>
                                @endif
                                
                                
                                                                
                            @endforeach
                        </div>
                    </div>
                    <form action="/messages" method="POST" id="message-form">
                        @csrf
                        <input type="hidden" id="message-name" value="{{ auth()->user()->name }}">
                        <div class=" flex justify-between items-center py-2 px-4 border-t border-gray-100">
                            <input type="text" name="message-input" id="message-input" class=" w-full focus:outline-none" placeholder="Ketik pesan...">
                            <button type="submit" class=" focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-blue-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>            
            </div> 
        </div>       
    </div>
    {{-- makemodal --}}
    <div class=" fixed hidden opacity-0 transition-all transform inset-0 z-10 overflow-y-auto" id="aggrementModal">
        <div class=" flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class=" fixed inset-0 transition-opacity" aria-hidden="true">
                <div class=" absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="  sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true" >&#8203;</span>
            <div class=" inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class=" flex justify-between items-center py-2 px-4 border-b border-gray-100">
                    <div class=" flex items-center">
                        <h2>Aggrement Proposal</h2>
                    </div>
                    <div class=" flex items-center">
                        <button class=" focus:outline-none" id="cancelAggrement">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-gray-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="align-middle">
                    <form action="/aggrement" method="POST" class="flex flex-col align-middle justify-center bg-zinc-100 p-4" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                        <label for="title" class="ml-12 font-semibold">Title</label>
                        <input type="text" name="title" id="title" class=" border border-gray-200 text-sm mx-12 p-1 rounded-sm">
                        <label for="price" class="ml-12 font-semibold">Price</label>
                        <input type="number" name="price" id="price" class=" border border-gray-200 text-sm mx-12 p-1 rounded-sm">
                        <label for="file" class="ml-12 font-semibold mt-4">Attach File</label>
                        <input type="file" class=" border border-gray-200 text-sm mx-12 p-1 bg-white" name="document" id="document">
                        <button type="submit" class="bg-pink-300 text-white text-sm mx-12 p-1 rounded-sm mt-4">Submit Proposal</button>
                    </form>
                </div>
            </div>    
        </div> 
    </div>     
    @if ($aggrement != null)
    {{-- makemodal counter--}}
    <div class=" fixed transition-all hidden opacity-0 transform inset-0 z-10 overflow-y-auto" id="aggrementUpdateModal">
        <div class=" flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class=" fixed inset-0 transition-opacity" aria-hidden="true">
                <div class=" absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="  sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true" >&#8203;</span>
            <div class=" inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class=" flex justify-between items-center py-2 px-4 border-b border-gray-100">
                    <div class=" flex items-center">
                        <h2>Aggrement Proposal</h2>
                    </div>
                    <div class=" flex items-center">
                        <button class=" focus:outline-none" id="cancelAggrement">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-gray-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="align-middle">
                    <form action="/aggrement/{{ $aggrement->id }}" method="POST" class="flex flex-col align-middle justify-center bg-zinc-100 p-4" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label for="title" class="ml-12 font-semibold">Title</label>
                        <input type="text" name="title" id="title" class=" border border-gray-200 text-sm mx-12 p-1 rounded-sm" value="{{ $aggrement->title }}" disabled>
                        <label for="price" class="ml-12 font-semibold">Price</label>
                        <input type="number" name="price" id="price" class=" border border-gray-200 text-sm mx-12 p-1 rounded-sm" value="{{ $aggrement->price }}">
                        <label for="file" class="ml-12 font-semibold mt-4">Attach File</label>
                        <a href="{{ asset('/storage/'.$aggrement['file_path']) }}" class="mx-12 text-sm underline">Check Document</a>
                        <button type="submit" class="bg-pink-300 text-white text-sm mx-12 p-1 rounded-sm mt-4">Submit Proposal</button>
                    </form>
                </div>
            </div>    
        </div>
    <div>        
    @endif  
    <script src="{{ asset('js/chat.js') }}"></script>

@endsection
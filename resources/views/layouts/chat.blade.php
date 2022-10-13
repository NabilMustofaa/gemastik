<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <style>
    body {
        font-family: 'Poppins';
    }
    html{
      overflow-x: hidden;
    }
    </style>

    {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('5ffd502396a114a03464', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
      });

      

    </script> --}}
        @vite('resources/js/app.js')
</head>
<body class=" bg-zinc-100">
  <nav class="w-screen py-2 px-16">
    <div class=" flex items-center justify-between">
        <div class="flex items-center">
            <a href="/home" class="text-2xl font-bold ml-2">McFluenc</a>
        </div>
      
      <div class=" flex justify-between align-middle">

          <button id="categoryNav" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
          </button>
          
          
          <input type="text" placeholder="Search...." class=" border text-sm border-gray-100 shadow-md rounded-full py-1 px-2 focus:border-gray-300 focus:shadow focus:outline-none w-72" id="searchBar">
          {{-- <button class="p-2 rounded-full bg-gray-600 hover:bg-gray-500 mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
              <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
            </svg>
          </button> --}}
        </form>
      </div>
      @auth
      <div class=" flex justify-between align-middle">
        <a href="/join" class=" border-pink-500 text-pink-500 text-sm border px-3 py-2 rounded-full hover:bg-pink-200">
          Become Partner
        </a>
        <button id="profile" class="flex justify-between align-middle hover:bg-zinc-300 rounded-md" >
          @if (Auth::user()->partner()->exists())
          <img src="{{ asset('/storage/'.Auth::user()->partner->image) }}" alt="" class="h-8 w-8 rounded-full my-1">
          @else
          <img src="{{ asset('img/profile.png') }}" alt="" class="h-8 w-8 rounded-full my-1 mx-2">
          @endif
          <h3 class=" text-sm my-auto mx-2 rounded-sm"> {{ auth()->user()->name }}</h3>
          <input type="hidden" id="message-sender" value="{{ auth()->user()->id }}">
        </button>
        
      </div>
      
      @else
      <button class=" text-white bg-pink-500 px-4 py-1 rounded-md" id="LoginButton">
        Login
      </button>
      @endauth
      
      
      
        
    </div>
    
  </nav>
  {{-- profile modal --}}
  <div id="profileModal" class="absolute opacity-0 top-0 left-0 w-screen h-full bg-black bg-opacity-50 -z-10 transition-all transform">
    <div id="profileModalContent" class="absolute top-[125px] right-[-5%] transform -translate-x-1/2 -translate-y-1/2 w-2/7 h-fit p-2 bg-white rounded-md shadow-md">
        <div class="flex justify-between  items-center mx-2 my-2 px-4 border border-b-gray-100 shadow-md rounded-md">
          @if (Auth::user()->partner()->exists())
          <img src="{{ asset('/storage/'.Auth::user()->partner->image) }}" alt="" class="h-8 w-8 rounded-full my-1">
          @else
          <img src="{{ asset('img/profile.png') }}" alt="" class="h-8 w-8 rounded-full my-1 mx-2">
          @endif
            <div class="flex justify-center items-center">
                <h3 class="text-base font-semibold">{{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="flex flex-col justify-end">
          <a href="/comingsoon" class="flex justify-between my-1 mx-4 px-2 rounded-sm hover:bg-zinc-100 ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" transition-all transform w-6 h-6 mx-1 stroke-gray-600 fill-zinc-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
              </svg>
              <h3 class="text-sm font-semibold">Favorite</h3>  
          </a href="/comingsoon">
          <button type="button" id="chatButton" class="flex justify-between my-1 mx-4 px-2 rounded-sm hover:bg-zinc-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class=" transition-all transform w-6 h-6 mx-1 stroke-gray-600 fill-zinc-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>
              <h3 class="text-sm font-semibold">Messages</h3>  
          </button>
          <a href="/comingsoon" class="flex justify-between my-1 mx-4 px-2 rounded-sm hover:bg-zinc-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class=" transition-all transform w-6 h-6 mx-1 stroke-gray-600 fill-zinc-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              <h3 class="text-sm font-semibold">History</h3>  
          </a>
          <a href="/comingsoon" class="flex justify-between my-1 mx-4 px-2 rounded-sm hover:bg-zinc-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class=" transition-all transform w-6 h-6 mx-1 stroke-gray-600 fill-zinc-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              <h3 class="text-sm font-semibold">Setting</h3>  
          </a>
          <form action="{{ route('logout') }}" method="POST" class="px-2">
              @csrf
              <button type="submit" class="flex w-full justify-between my-1 mx-4 rounded-sm hover:bg-zinc-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class=" transition-all transform w-6 h-6 mx-1 stroke-gray-600 fill-zinc-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <h3 class="text-sm font-semibold mr-8">Logout</h3>  
              </button>
          </form>


      </div>
        

    </div>
  </div> 
    {{-- category dropdown  --}}
    <div id="categoryDropdown" class="absolute opacity-0 top-0 left-0 w-screen h-full bg-black bg-opacity-50 -z-10 transition-all transform">
      <div class="absolute left-[calc(31%-12rem)] top-[35px] mt-2 w-80 rounded-md shadow-lg transform translate-all z-10 bg-white border border-gray-100" >
        <div class="py-1 flex flex-row-reverse" id="categoryDropdownContent">
          <div class="flex flex-col border bg-white border-white border-r-gray-200 flex-wrap-reverse h-56">
            @foreach ($categories as $category) 
            <a href="/category/{{ $category->id }}" class="block px-4 py-2 text-sm text-right bg-white text-gray-700 hover:bg-zinc-100 hover:text-gray-900" role="menuitem">{{$category->name}}</a>
            @endforeach
            
          </div>
        </div>
      </div>    
    </div>  
  
    {{-- search dropdown  --}}
    <div id="searchDropdown" class="absolute opacity-0 top-0 left-0 w-screen h-full bg-black bg-opacity-50 -z-10 transition-all transform">
      <div class="absolute left-[calc(49%-10.5rem)] top-[37px] w-72 mt-2 rounded-md shadow-lg transform translate-all z-10 bg-white border border-gray-100" >
        <div class="py-1 flex w-full" >
          <div class="flex flex-col w-full" id="searchDropdownContent">
          </div>
        </div>
      </div>
    </div>
    {{-- login modal --}}
  {{-- login modal --}}
  <div id="loginModal" class="absolute opacity-0 -z-10 top-0 left-0 w-screen h-full bg-black bg-opacity-50 transition-all transform">
    <div class="absolute left-[calc(50%-12rem)] top-[calc(50%-12rem)] w-96 h-fit mt-2 rounded-md shadow-lg transform translate-all  bg-white border border-gray-100" >

      <div class="flex flex-col justify-center items-center h-full">
        <div class="flex w-full justify-end items-center px-12 pt-4">
            <button class=" focus:outline-none" id="cancelButton">
                <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-gray-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-between align-middle w-full px-12 py-4">
          <h1 class="text-3xl font-bold">Login</h1>
          <button id="registerButton" class="text-pink-500 underline"> Register</button>
        </div>
        <form action="/login" method="post">
          @csrf
          <div class="flex flex-col my-8">
            <label for="email" class="text-sm font-semibold">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-200 w-72 rounded-md px-2 py-1 my-1">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input type="password" name="password" id="password" class="border border-gray-200 rounded-md px-2 py-1 my-1">
            <button class="bg-pink-500 text-white rounded-md px-2 py-1 my-4">Login</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  {{-- Sign up Modal --}}
  <div id="signupModal" class="absolute opacity-0 -z-10 top-0 left-0 w-screen h-full bg-black bg-opacity-50 transition-all transform">
    <div class="absolute left-[calc(50%-12rem)] top-[calc(50%-12rem)] w-96 h-fit mt-2 rounded-md shadow-lg transform translate-all  bg-white border border-gray-100" >

      <div class="flex flex-col justify-center items-center h-full">
        <div class="flex w-full justify-end items-center px-12 pt-4">
            <button class=" focus:outline-none" id="cancelButtonSignup">
                <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-gray-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-between align-middle w-full px-12 py-4">
          <h1 class="text-3xl font-bold">Sign Up</h1>
          <button id="loginButtonModal" class="text-pink-500 underline"> Login</button>
        </div>
        <form action="/register" method="post">
          @csrf
          <div class="flex flex-col my-8">
            <label for="name" class="text-sm font-semibold">Name</label>
            <input type="text" name="name" id="name" class="border border-gray-200 w-72 rounded-md px-2 py-1 my-1">
            <label for="email" class="text-sm font-semibold">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-200 w-72 rounded-md px-2 py-1 my-1">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input type="password" name="password" id="password" class="border border-gray-200 rounded-md px-2 py-1 my-1">
            <button class="bg-pink-500 text-white rounded-md px-2 py-1 my-4">Next</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  @auth
  <div id="chatModal" class="absolute opacity-0 -z-10 top-0 left-0 w-screen h-full bg-black bg-opacity-50 transition-all transform">
    <div class="absolute left-[calc(50%-12rem)] top-[calc(50%-12rem)] w-96 h-fit mt-2 rounded-md shadow-lg transform translate-all  bg-white border border-gray-100" >
      <div class="flex flex-col justify-center items-center h-full">
        <div class="flex w-full flex-row-reverse justify-between items-center px-12 py-4 border-b border-gray-300">
            <button class=" focus:outline-none" id="cancelButtonChat">
                <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 text-gray-500 hover:-translate-y-1 transition-all transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex justify-between align-middle w-full">
              <h1 class="text-3xl font-bold">Chat</h1>
            </div>
        </div>
        <div class="flex flex-col justify-between w-full">
            {{-- select chat --}}
            {{-- chat --}}
            @php
              $arraymessagesid = array();
              $messages1=auth()->user()->sentMessages;
              $messages2=auth()->user()->receivedMessages;
              $messages = $messages1->merge($messages2);
            @endphp
            @foreach ($messages as $message)
              @if (!in_array($message->receiver_id, $arraymessagesid))
                @php
                  array_push($arraymessagesid, $message->receiver_id);
                  array_push($arraymessagesid, $message->sender_id);
                @endphp
                <div class="flex flex-col justify-between w-full">
                  <a href="/chat/@if ($message->receiver_id == auth()->user()->id)
                    {{$message->sender->id}}
                  @else
                    {{$message->receiver->id}}
                  @endif" class="flex justify-between items-center w-full px-12 py-2 border-y border-gray-200">
                    <img src="{{ asset('img/profile.png') }}" class="rounded-full h-12 w-12">
                    <div class=" w-3/4">
                        <h1 class="text-base font-bold">
                          @if ($message->receiver_id == auth()->user()->id)
                            {{$message->sender->name}}
                          @else
                            {{$message->receiver->name}}
                          @endif
                        </h1>
                    </div>
                  </a>
                </div>
              @endif
              @if (!in_array($message->sender_id, $arraymessagesid))
                @php
                  array_push($arraymessagesid, $message->receiver_id);
                  array_push($arraymessagesid, $message->sender_id);
                @endphp
                <div class="flex flex-col justify-between w-full">
                  <a href="/chat/@if ($message->receiver_id == auth()->user()->id)
                    {{$message->sender->id}}
                  @else
                    {{$message->receiver->id}}
                  @endif" class="flex justify-between items-center w-full px-12 py-2 border-y border-gray-200">
                    <img src="{{ asset('img/profile.png') }}" class="rounded-full h-12 w-12">
                    <div class=" w-3/4">
                        <h1 class="text-base font-bold">
                          @if ($message->receiver_id == auth()->user()->id)
                            {{$message->sender->name}}
                          @else
                            {{$message->receiver->name}}
                          @endif
                        </h1>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
        </div>
      </div>
    </div>
  </div>
  @endauth

  @yield('content')
  <script src="{{ asset('js/main.js') }}"></script>
  

</body>
</html>

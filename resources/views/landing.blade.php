<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
    body {
        font-family: 'Poppins';
    }
    </style>
</head>
<body class=" m-0">
  <div class=" container">
    <div class=" flex flex-col bg-blend-darken h-[40vh] w-screen justify-center items-center" style="background-image: url('/img/bg.jpg')">
      <h1 class=" text-5xl font-bold text-white"> Welcome to McFluenc </h1>
      <h5 class =" text-base font-bold text-white tracking-wider mt-4"> SMALL GOING BIG</h5>
    </div>
    <div class=" flex flex-col bg-white h-[60vh] w-screen px-8 items-center justify-between">
      <div>
        <div class=" flex flex-col font-semibold text-base text-center mt-20 mb-6">
          <h5 class=" -mt-2">UMKM</h5>
          <h5 class=" -mt-2">MICRO INFLUENCER</h5>
          <h5 class=" -mt-2">MODEL</h5>
        </div>
        <h5 class="text-center text-xl font-semibold mx-auto w-3/5">
          Tempat kolaborasi antara UMKM dengan para micro influencer untuk menemukan solusi produksi dalam bidang social media specialist 
        </h5>
      </div>
      <div class="flex flex-col self-start w-full px-16 my-6">
        <p class="text-base">Why must choose McFluenc?</p>
        <div class="flex justify-between mt-4">
          <div class="flex justify-between align-middle w-2/5">
            <img src="{{ asset('img/profile.png') }}" class=" w-12 h-12 mt-2 rounded-full" alt="">
            <p class="mt-2 mx-4"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus laboriosam placeat</p>
          </div>
          <div class=" my-5">
            <a href="/home" class=" bg-slate-800 hover:bg-slate-700 px-8 py-2 text-xl text-white font-medium rounded-sm">Get Started</a>
          </div>
          

        </div>
      </div>
    </div>
  </div>
  
</body>
</html>
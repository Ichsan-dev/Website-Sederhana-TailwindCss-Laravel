@php
    $Jumbotron    = get_jumbotron();
    $service      = get_service();
    $portofolio   = get_portofolio();
    $about        = get_about();
@endphp

<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  @vite('resources/css/app.css')
</head>
 <body>
    <!-- Header Start -->
    <header class="bg-slate-800 sticky top-0">
      @foreach ($Jumbotron as $item)
      <nav class="text-white container mx-auto py-3 flex justify-between items-center px-4">
        <a href="#" class="text-3xl font-bold"> {{$item->title}}</a>
        <ul class="hidden md:flex bg-slate-800 md:relative md:top-0 md:divide-y-0 md:w-auto" id="menu">
          <li class="px-7 py-1 hover:text-gray-400"><a href="#Service">Service</a></li>
          <li class="px-7 py-1 hover:text-gray-400"><a href="#Portofolio">Portofolio</a></li>
          <li class="px-7 py-1 hover:text-gray-400"><a href="#about">About</a></li>
          <li class="px-7 py-1 hover:text-gray-400 md:hover:text-white"><a href="{{route('login')}}" class="md:px-5 md:py-2 md:border-2 md:border-red-500 md:rounded-xl md:hover:bg-red-700 text-white">Getting Started</a></li>
        </ul>
        <button class="text-2xl md:hidden" id="hamburger-menu">
          <i class="fa-solid fa-bars"></i>
          <i class="fa-solid fa-xmark hidden"></i>
        </button>
      </nav>
       
    </header>
    <!-- Header End -->

    <!-- Hero Start -->
    <section class="bg-slate-900">
      <div class="container mx-auto text-center text-white h-screen flex items-center">
        <div class="mx-auto md:w-2/4 w-3/4">
          <h3 class="text-5xl font-bold text-center mb-5">Bring Your Business To The Next Level</h3>
          <p class="text-slate-400 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, laudantium itaque consequatur molestiae vel aspernatur.</p>
          <a href="" class="bg-red-500 text-white py-2 px-5 rounded-xl hover:bg-red-800"> See All Portofolio</a>
        </div>
      </div>
      @endforeach
    </section>
   
    <!-- Hero End -->

    <!-- Service Start -->
    <section id="Service" class="bg-slate-200 py-20">
      <div class="w-11/12 md:container mx-auto">
        <h3 class="text-5xl font-bold text-center mb-5">Our Service</h3>
        <p class="text-slate-500 text-center mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, a sunt soluta voluptate facilis dolore!</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          @foreach ($service as $item)
          <div class="flex space-x-5 py-8 px-8 bg-white rounded-xl items-start">
           <img src="{{ asset('storage/service/' . $item->image) }}" class="card-img-top w-32 h-24" alt=""/>
            <div>
              <h4 class="text-2xl font-bold mb-2">{{$item->title}}</h4>
              <p class="text-slate-500 mb-2">{{$item->deskripsi}}</p>
              <a href="" class="hover:text-gray-500">read more</a>
            </div>
          </div>
           @endforeach
        </div>
      </div>
    </section>
    <!-- Service End-->
    

    <!-- Portofolio start -->
    <section id="Portofolio" class="py-20 bg-white px-3">
      <h3 class="text-5xl font-bold text-center mb-5">Portofolio</h3>
      <p class="text-slate-500 text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, inventore.</p>
      <div class="grid grid-cols-2 px-2 md:grid-cols-4 w-11/12 md:container mx-auto gap-6">
        <!-- Portofolio 1 -->
        @foreach ($portofolio as $item)
        <div class="shadow-xl">
          <a href="">
            <img src="{{ asset('storage/portofolio/' . $item->image) }}" alt="" class="w-full" />
            <div class="py-3 px-5">
              <h4 class="text-center font-bold">{{$item->titleImage}}</h4>
            </div>
          </a>
        </div>
     @endforeach
      </div>
    </section>
    <!-- Portofolio end -->

    <!-- About Start -->
    <section class="container mx-auto py-20" id="about">
      @foreach ($about as $about)
      <div class="flex space-x-10 items-start">
        <img src="{{ asset('storage/about/' . $about->image) }}" alt="300x300" class="w-64 md:w-1/3" />
        <div>
          <p class="mb-5">{{$about->deskripsi1}}</p>
          <h3 class="text-5xl font-bold mb-5">{{$about->title}}</h3>
          <p class="mb-5">
         {{$about->deskripsi}}
          </p>
           @endforeach
          <ul class="flex space-x-5">
            <li>
              <a href="https://www.tiktok.com"><i class="fa-brands fa-tiktok"></i> Tiktok</a>
            </li>
            <li>
              <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i> Facebook</a>
            </li>
            <li>
              <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i> Instagram</a>
            </li>
            <li>
              <a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i> Youtube</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- About End -->

    <footer class="bg-slate-800 py-5 text-center font-bold text-slate-200">&copy; 2024 TailSimple</footer>
    <script src="{{asset('Halaman-Depan/script.js')}}"></script>
  </body>
</html>
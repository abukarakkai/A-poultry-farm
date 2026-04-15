<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="icon" href="{{ asset('storage/' . setting('logo')) }}">

</head>

<body>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .font-berkshire {
            font-family: 'Berkshire Swash', cursive;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

    <section id="home"
        class="relative flex flex-col items-center pb-48 text-center text-sm text-white max-md:px-4 overflow-hidden">
        <!-- NAVBAR -->
        <!-- Background Slider -->
        <div class="absolute inset-0 -z-10">
            <div class="slider-image absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100"
                style="background-image: url('{{ asset('images/chicks.avif') }}');"></div>

            <div class="slider-image absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
                style="background-image: url('{{ asset('images/poultry-chicks.avif') }}');"></div>

            <div class="slider-image absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
                style="background-image:  url('{{ asset('images/poultry-chicks2.avif') }}'); " ></div>

            <!-- Dark overlay for readability -->
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <nav id="navbar" class="fixed top-0 left-0 w-full z-50 backdrop-blur-lg bg-white/10 border-b border-white/10 transition-all duration-300">
                <div class="flex justify-between items-center px-6 md:px-16 lg:px-24 py-0">

                <!-- Logo -->
                 
                <a href="#home" id="logoTrigger" class="text-2xl font-semibold font-berkshire tracking-wide select-none">
                                        @if(setting('logo'))
                  <img src="{{ asset('storage/'.setting('logo')) }}" 
                             class="h-20 mx-auto">
                            @endif

                    PoultryFarm
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-10 text-sm">
                    <a href="#home" class="hover:text-yellow-400 transition">Home</a>
                    <a href="#about" class="hover:text-yellow-400 transition">About</a>
                    <a href="#services" class="hover:text-yellow-400 transition">Services</a>
                    <a href="#contact" class="hover:text-yellow-400 transition">Contact</a>
                </div>

                <!-- Desktop Button -->
                <a href="#contact"
                    class="hidden md:block bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2.5 rounded-full font-medium transition">
                    Get in touch
                </a>

                <!-- Mobile Button -->
                <button id="menuBtn" class="md:hidden text-white z-50">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Slide Menu -->
        <div id="mobileMenu"
            class="fixed top-0 right-0 h-full w-72 bg-slate-950/95 backdrop-blur-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 shadow-2xl md:hidden">

            <div class="flex justify-between items-center px-6 py-5 border-b border-white/10">
                <span class="text-lg font-semibold">Menu</span>

                <!-- Close Button -->
                <button id="closeMenu" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-col gap-6 px-6 py-10 text-base">
                <a href="#home" class="hover:text-yellow-400 transition">Home</a>
                <a href="#about" class="hover:text-yellow-400 transition">About</a>
                <a href="#services" class="hover:text-yellow-400 transition">Services</a>
                <a href="#contact" class="hover:text-yellow-400 transition">Contact</a>

                <a href="#contact" class="mt-6 bg-yellow-600 hover:bg-yellow-700 text-slate-900 py-3 rounded-full font-medium">
                    Get Started
                </a>
            </div>
        </div>
        <!-- Mobile Slide Menu -->
        <!-- HERO CONTENT -->
        <div class="pt-32"></div>

        <!-- <div
            class="flex flex-wrap items-center justify-center p-1.5 mt-10 rounded-full border border-slate-400 text-xs">
            <div class="flex items-center">
                <img class="size-7 rounded-full border-2 border-white"
                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=50" alt="Founder 1">
                <img class="size-7 rounded-full border-2 border-white -translate-x-2"
                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=50" alt="Founder 2">
                <img class="size-7 rounded-full border-2 border-white -translate-x-4"
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=50" alt="Founder 3">
            </div>
            <p class="-translate-x-2">Join community of 1m+ founders</p>
        </div> -->

        <h1 class="font-berkshire text-[45px]/[52px] md:text-6xl/[65px] mt-6 max-w-4xl">
            <!-- Arrayhaan Poultry Farm -->
            {{ setting('farm_name') ?? 'Poultry Farm System' }}
        </h1>

        <p class="text-base mt-4 max-w-xl">
            Produces fresh, nutritious eggs from well-cared-for layers.
            We are proud to support our community with quality you can rely on daily. </p>

        <a href="#contact"
            class="flex items-center gap-2 bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 mt-8 rounded-full transition">
            <span>View Our Farm</span>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.166 10h11.667m0 0L9.999 4.167M15.833 10l-5.834 5.834" stroke="#fff" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>

        <!-- <form class="flex items-center mt-8 max-w-lg h-16 w-full rounded-full border border-white/30 backdrop-blur">
            <input type="email" placeholder="Enter email address"
                class="w-full h-full outline-none bg-transparent pl-6 pr-1 text-white placeholder:text-slate-300 rounded-full">
            <button
                class="bg-white text-slate-900 hover:bg-gray-200 text-nowrap px-8 h-12 mr-2 rounded-full font-medium transition">
                Early Access
            </button>
        </form> -->

    </section>

    <!-- ================= ABOUT SECTION ================= -->
    <section id="about" class="bg-[#FEF8EE] py-20 px-6 md:px-16 lg:px-24">

        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">

            <!-- Left: Image -->
            <div class="relative group w-full">

                <!-- TOP-LEFT (Thin - Inner) -->
                <div class="absolute -top-3 -left-3 w-16 h-16 
                border-t-2 border-l-2 border-yellow-500">
                </div>

                <!-- BOTTOM-RIGHT (Bold - Outer) -->
                <div class="absolute -bottom-6 -right-6 w-24 h-24 
                border-b-4 border-r-4 border-yellow-600">
                </div>

                <!-- Image -->
                <img src = "{{ asset('images/chicks.avif') }}" alt="Arrayhaan Poultry Farm Layers" class="rounded-md shadow-2xl w-full object-cover
               transition-transform duration-500
               group-hover:scale-105">

            </div>
            <div>
                <div class="relative inline-block mb-4">

                    <!-- Top Left Unfinished Square -->
                    <div class="absolute -top-3 -left-3 w-10 h-10 border-l-2 border-t-2 border-yellow-600"></div>

                    <!-- Bottom Right Unfinished Square -->
                    <div class="absolute -bottom-3 -right-3 w-10 h-10 border-r-2 border-b-2 border-yellow-600"></div>

                    <span
                        class="relative text-yellow-600 font-semibold tracking-wider capitalize text-sm bg-[#FEF8EE] px-3 py-1">
                        About {{ setting('farm_name') ?? 'Poultry Farm System' }}
                    </span>

                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mt-4 leading-tight">
                    Dedicated to Excellence in Layer Farming
                </h2>

                <p class="text-slate-600 mt-6 leading-relaxed">
                    {{ setting('farm_name') ?? 'Poultry Farm System' }} specializes in professional layer farming,
                    producing fresh, nutritious eggs through modern housing systems,
                    balanced feeding programs, and strict biosecurity measures.
                    Our commitment to bird welfare and hygiene ensures consistent
                    production and dependable supply for our partners.
                </p>

                <!-- Feature Points -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">

                    <div class="flex items-start gap-3">
                        <div class="bg-yellow-600 text-white p-2 rounded-lg">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Modern Housing</h4>
                            <p class="text-sm text-slate-600">Well-ventilated and controlled environments.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-yellow-600 text-white p-2 rounded-lg">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Strict Biosecurity</h4>
                            <p class="text-sm text-slate-600">Maintaining high hygiene standards daily.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-yellow-600 text-white p-2 rounded-lg">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Consistent Supply</h4>
                            <p class="text-sm text-slate-600">Reliable egg production year-round.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-yellow-600 text-white p-2 rounded-lg">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Healthy Layers</h4>
                            <p class="text-sm text-slate-600">Focused on bird welfare and nutrition.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

<section class="py-20 bg-white text-gray-800">
  <div class="max-w-7xl mx-auto px-6 lg:px-16 text-center">

    <!-- Section Title -->
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      Our Layer Farming Process
    </h2>
    <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
      Precision, care, and consistency at every stage to deliver high-quality eggs you can trust.
    </p>

    <!-- Process Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Card 1 -->
      <div class="bg-yellow-50 rounded-2xl p-6 shadow-lg opacity-0 translate-y-8 transition-all duration-700 card">
        <div class="text-yellow-600 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Housing & Environment</h3>
        <p class="text-gray-600 text-sm">
          Comfortable and controlled housing to keep our layers healthy and productive.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-yellow-50 rounded-2xl p-6 shadow-lg opacity-0 translate-y-8 transition-all duration-700 card">
        <div class="text-yellow-600 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm0 0v6m0-6h4m-4 0H8" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Balanced Feeding</h3>
        <p class="text-gray-600 text-sm">
          Nutritionally balanced feed and supplements for optimal egg production and layer health.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-yellow-50 rounded-2xl p-6 shadow-lg opacity-0 translate-y-8 transition-all duration-700 card">
        <div class="text-yellow-600 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-6V7m0 0H7m5 0h5" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Health & Biosecurity</h3>
        <p class="text-gray-600 text-sm">
          Regular monitoring and strict biosecurity measures to prevent disease and ensure safe production.
        </p>
      </div>

      <!-- Card 4 -->
      <div class="bg-yellow-50 rounded-2xl p-6 shadow-lg opacity-0 translate-y-8 transition-all duration-700 card">
        <div class="text-yellow-600 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v4h18v-4M3 15l4-4 4 4 4-4 4 4" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Egg Collection & Quality</h3>
        <p class="text-gray-600 text-sm">
          Careful collection, cleaning, and grading to deliver premium eggs to our customers.
        </p>
      </div>

    </div>
  </div>
</section>

<section id="services" class="py-20 bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 text-center">
        
        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Our Eggs & Products
        </h2>
        <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
            Fresh, high-quality eggs and poultry products directly from our layer farm to your table.
        </p>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Product Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group transition-transform duration-500 hover:scale-105">
                <div class="relative">
                    <img src="{{ asset('images/poultry-egg.avif') }}" alt="Fresh Eggs"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-3 left-3 w-12 h-12 border-2 border-yellow-500 rounded-tr-lg"></div>
                    <div class="absolute bottom-3 right-3 w-16 h-16 border-4 border-yellow-500 rounded-bl-lg"></div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="font-semibold text-lg mb-2">Fresh Layer Eggs</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Clean, nutritious eggs collected daily from our healthy layers.
                    </p>
                    <button class="bg-yellow-600 text-white px-6 py-2 rounded-full font-medium hover:bg-yellow-700 transition">
                        Order Now
                    </button>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group transition-transform duration-500 hover:scale-105">
                <div class="relative">
                    <img src="{{ asset('images/poultry-chicks2.avif') }}" alt="Organic Feed"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-3 left-3 w-12 h-12 border-2 border-yellow-500 rounded-tr-lg"></div>
                    <div class="absolute bottom-3 right-3 w-16 h-16 border-4 border-yellow-500 rounded-bl-lg"></div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="font-semibold text-lg mb-2">Balanced Feed</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        High-quality feed to keep our layers healthy and producing premium eggs.
                    </p>
                    <button class="bg-yellow-600 text-white px-6 py-2 rounded-full font-medium hover:bg-yellow-700 transition">
                        Learn More
                    </button>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group transition-transform duration-500 hover:scale-105">
                <div class="relative">
                    <img src="{{ asset('images/packaged-egg.avif') }}" alt="Packaged Eggs"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-3 left-3 w-12 h-12 border-2 border-yellow-500 rounded-tr-lg"></div>
                    <div class="absolute bottom-3 right-3 w-16 h-16 border-4 border-yellow-500 rounded-bl-lg"></div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="font-semibold text-lg mb-2">Packaged Eggs</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Hygienically packed eggs for delivery and retail, maintaining freshness.
                    </p>
                    <button class="bg-yellow-600 text-white px-6 py-2 rounded-full font-medium hover:bg-yellow-700 transition">
                        Buy Now
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-20 bg-gray-100 text-gray-800">
  <div class="max-w-7xl mx-auto px-6 lg:px-16 text-center">

    <!-- Section Title -->
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      What Our Customers Say
    </h2>
    <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
      Trusted by local retailers and families who value fresh, high-quality eggs.
    </p>

    <!-- Testimonials Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Testimonial Card 1 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 text-left relative group transition-transform duration-500 hover:scale-105">
        <div class="flex items-center mb-4">
          <img src="{{ asset('images/chicks.avif') }}" alt="Customer 1" class="w-12 h-12 rounded-full mr-4 object-cover">
          <div>
            <h3 class="font-semibold text-lg">Aisha Bello</h3>
            <p class="text-yellow-600 text-sm">Retailer</p>
          </div>
        </div>
        <p class="text-gray-600 text-sm">
          “Arrayhaan Poultry Farm provides the freshest eggs consistently. My customers love the quality and freshness.”
        </p>
        <svg class="absolute top-3 right-3 w-6 h-6 text-yellow-400 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 0l3.09 6.26L22 7.27l-5 4.87L18.18 22 12 18.54 5.82 22 7 12.14 2 7.27l6.91-1.01L12 0z"/>
        </svg>
      </div>

      <!-- Testimonial Card 2 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 text-left relative group transition-transform duration-500 hover:scale-105">
        <div class="flex items-center mb-4">
          <img src="{{ asset('images/photo-1538170989343-ce003278e1a3.avif') }}"  alt="Customer 2" class="w-12 h-12 rounded-full mr-4 object-cover">
          <div>
            <h3 class="font-semibold text-lg">Emeka Okafor</h3>
            <p class="text-yellow-600 text-sm">Home Buyer</p>
          </div>
        </div>
        <p class="text-gray-600 text-sm">
          “I’ve been buying Arrayhaan eggs for months. The consistency in quality and taste is unmatched.”
        </p>
        <svg class="absolute top-3 right-3 w-6 h-6 text-yellow-400 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 0l3.09 6.26L22 7.27l-5 4.87L18.18 22 12 18.54 5.82 22 7 12.14 2 7.27l6.91-1.01L12 0z"/>
        </svg>
      </div>

      <!-- Testimonial Card 3 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 text-left relative group transition-transform duration-500 hover:scale-105">
        <div class="flex items-center mb-4">
          <img src="{{ asset('images/poultry-chicks.avif') }}" alt="Customer 3" class="w-12 h-12 rounded-full mr-4 object-cover">
          <div>
            <h3 class="font-semibold text-lg">Fatima Yusuf</h3>
            <p class="text-yellow-600 text-sm">Restaurant Owner</p>
          </div>
        </div>
        <p class="text-gray-600 text-sm">
          “The eggs arrive on time, always fresh, and my chefs love them. Arrayhaan Poultry Farm is reliable!”
        </p>
        <svg class="absolute top-3 right-3 w-6 h-6 text-yellow-400 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 0l3.09 6.26L22 7.27l-5 4.87L18.18 22 12 18.54 5.82 22 7 12.14 2 7.27l6.91-1.01L12 0z"/>
        </svg>
      </div>

    </div>
  </div>
</section>



<section id="contact" class="relative py-24 bg-gradient-to-br from-gray-50 via-white-100 to-white-200 text-gray-800 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-16 relative z-10">

    <!-- Section Title -->
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">
        Contact {{ setting('farm_name') ?? 'Poultry Farm System' }}
      </h2>
      <p class="text-gray-700 text-lg md:text-xl max-w-2xl mx-auto">
        Have questions, want to place an order, or just say hello? Reach out to us and we’ll get back to you promptly!
      </p>
    </div>

    <!-- Contact Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Phone Card -->
      <div class="bg-white rounded-3xl p-8 shadow-2xl hover:scale-105 transition-transform duration-500 relative overflow-hidden group">
        <div class="absolute -top-10 -left-10 w-32 h-32 border-4 border-yellow-400 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 border-4 border-yellow-500 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="flex flex-col items-center text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"/>
          </svg>
          <h4 class="font-bold text-xl mb-2">Call Us</h4>
          <p class="text-gray-600">{{ setting('phone')}}</p>
        </div>
      </div>

      <!-- Email Card -->
      <div class="bg-white rounded-3xl p-8 shadow-2xl hover:scale-105 transition-transform duration-500 relative overflow-hidden group">
        <div class="absolute -top-10 -left-10 w-32 h-32 border-4 border-yellow-400 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 border-4 border-yellow-500 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="flex flex-col items-center text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m0 8l-4-4"/>
          </svg>
          <h4 class="font-bold text-xl mb-2">Email</h4>
          <p class="text-gray-600">info@arrayhaanpoultry.com</p>
        </div>
      </div>

      <!-- Location Card -->
      <div class="bg-white rounded-3xl p-8 shadow-2xl hover:scale-105 transition-transform duration-500 relative overflow-hidden group">
        <div class="absolute -top-10 -left-10 w-32 h-32 border-4 border-yellow-400 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 border-4 border-yellow-500 rounded-full opacity-30 group-hover:opacity-50 transition-opacity"></div>
        <div class="flex flex-col items-center text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-5l-10-10-10 10v5h5"/>
          </svg>
          <h4 class="font-bold text-xl mb-2">Visit Us</h4>
          <p class="text-gray-600 capitalize">{{ setting('address') }}</p>
        </div>
      </div>

    </div>

    <!-- Contact Form Below Cards -->
    <div class="mt-20 bg-white rounded-3xl p-10 shadow-2xl max-w-4xl mx-auto">
      <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input type="text" placeholder="Your Name" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none">
        <input type="email" placeholder="Your Email" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none">
        <input type="text" placeholder="Subject" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none md:col-span-2">
        <textarea rows="4" placeholder="Your Message" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none md:col-span-2"></textarea>
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-full font-semibold transition md:col-span-2">
          Send Message
        </button>
      </form>
    </div>

  </div>

  <!-- Optional Decorative Animations -->
  <div class="absolute top-0 left-0 w-60 h-60 bg-yellow-600 rounded-full mix-blend-multiply opacity-30 animate-pulse"></div>
  <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply opacity-20 animate-pulse"></div>

</section>

<section class="bg-gray-900 text-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-6 lg:px-16">
    <!-- Footer Top: Brand + Links + Social -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

      <!-- Brand -->
      <div class="space-y-4">
        <h3 class="text-2xl font-berkshire text-yellow-500">{{ setting('farm_name') ?? 'Poultry Farm System' }}</h3>
        <p class="text-gray-400 text-sm">
          Premium layer farming with care, consistency, and quality eggs you can trust.
        </p>
        <div class="flex space-x-4 mt-2">
          <a href="#" class="hover:text-yellow-500 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.876v-6.987h-2.54v-2.889h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.463h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.889h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/>
            </svg>
          </a>
          <a href="#" class="hover:text-yellow-500 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724c-.951.566-2.005.978-3.127 1.2A4.918 4.918 0 0016.616 3c-2.72 0-4.924 2.206-4.924 4.924 0 .386.045.762.127 1.124C7.728 8.964 4.1 6.837 1.671 3.905a4.822 4.822 0 00-.666 2.475c0 1.708.869 3.215 2.188 4.098a4.904 4.904 0 01-2.23-.616v.062c0 2.385 1.697 4.374 3.946 4.828a4.936 4.936 0 01-2.224.084c.623 1.946 2.432 3.364 4.576 3.404A9.869 9.869 0 010 19.54a13.924 13.924 0 007.548 2.212c9.057 0 14.01-7.507 14.01-14.01 0-.213-.005-.426-.014-.637A10.012 10.012 0 0024 4.557z"/>
            </svg>
          </a>
          <a href="#" class="hover:text-yellow-500 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.334 3.608 1.31.975.976 1.247 2.243 1.31 3.609.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.334 2.633-1.31 3.608-.976.975-2.243 1.247-3.609 1.31-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.976-1.247-2.243-1.31-3.609C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.849c.062-1.366.334-2.633 1.31-3.608C4.518 2.567 5.785 2.295 7.151 2.233 8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.012 7.052.07 5.772.128 4.5.403 3.364 1.54c-1.136 1.136-1.412 2.408-1.47 3.688C1.882 6.332 1.87 6.741 1.87 12s.012 5.668.07 6.948c.058 1.28.334 2.552 1.47 3.688 1.136 1.136 2.408 1.412 3.688 1.47 1.28.058 1.689.07 6.948.07s5.668-.012 6.948-.07c1.28-.058 2.552-.334 3.688-1.47 1.136-1.136 1.412-2.408 1.47-3.688.058-1.28.07-1.689.07-6.948s-.012-5.668-.07-6.948c-.058-1.28-.334-2.552-1.47-3.688C20.552.403 19.28.128 18 .07 16.719.012 16.31 0 12 0z"/>
              <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998z"/>
              <circle cx="18.406" cy="5.594" r="1.44"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="space-y-3">
        <h4 class="text-lg font-semibold mb-3">Quick Links</h4>
        <ul class="space-y-2 text-gray-400">
          <li><a href="#" class="hover:text-yellow-500 transition">Home</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">About</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Services</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Gallery</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Contact</a></li>
        </ul>
      </div>

      <!-- Services / Highlights -->
      <div class="space-y-3">
        <h4 class="text-lg font-semibold mb-3">Our Services</h4>
        <ul class="space-y-2 text-gray-400">
          <li><a href="#" class="hover:text-yellow-500 transition">Layer Farming</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Egg Collection</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Balanced Feeding</a></li>
          <li><a href="#" class="hover:text-yellow-500 transition">Health & Biosecurity</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="space-y-3">
        <h4 class="text-lg font-semibold mb-3">Newsletter</h4>
        <p class="text-gray-400 text-sm">Subscribe for updates on farm news and egg availability.</p>
        <form class="mt-2 flex">
          <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 rounded-l-full focus:outline-none text-gray-900">
          <button type="submit" class="bg-yellow-500 px-4 py-2 rounded-r-full font-semibold hover:bg-yellow-600 transition">Subscribe</button>
        </form>
      </div>

    </div>

    <!-- Footer Bottom -->
    <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
      &copy; 2026 {{ setting('farm_name') ?? 'Poultry Farm System' }}. All rights reserved.
    </div>
  </div>
</section>


    <script>

      let clickCount = 0;
const trigger = document.getElementById('logoTrigger');

trigger.addEventListener('click', (e) => {
    e.preventDefault(); // prevent normal link

    clickCount++;

    if (clickCount === 5) {
        window.location.href = "/admin-access-portal-AX92k";
    }

    setTimeout(() => {
        clickCount = 0;
    }, 2000);
});


document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.getElementById("navbar");
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMenu = document.getElementById("closeMenu");

    // =========================
    // NAVBAR SCROLL EFFECT
    // =========================
    window.addEventListener("scroll", () => {
        if (window.scrollY > 80) {

            navbar.classList.remove("bg-white/10", "border-white/10");
            navbar.classList.add("bg-white", "shadow-lg", "border-gray-200");

            // Dark text
            navbar.querySelectorAll("a").forEach(link => {
                link.classList.add("text-gray-800");
            });

            menuBtn.classList.remove("text-white");
            menuBtn.classList.add("text-gray-800");

        } else {

            navbar.classList.remove("bg-white", "shadow-lg", "border-gray-200");
            navbar.classList.add("bg-white/10", "border-white/10");

            // Light text
            navbar.querySelectorAll("a").forEach(link => {
                link.classList.remove("text-gray-800");
            });

            menuBtn.classList.remove("text-gray-800");
            menuBtn.classList.add("text-white");
        }
    });

    // =========================
    // MOBILE MENU
    // =========================

    // OPEN MENU
    menuBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
        mobileMenu.classList.add("translate-x-0");
        document.body.style.overflow = "hidden";
    });

    // CLOSE MENU (X button)
    closeMenu.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-0");
        mobileMenu.classList.add("translate-x-full");
        document.body.style.overflow = "auto";
    });

    // CLOSE WHEN CLICKING OUTSIDE MENU
    document.addEventListener("click", (e) => {
        if (!mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
            mobileMenu.classList.remove("translate-x-0");
            mobileMenu.classList.add("translate-x-full");
            document.body.style.overflow = "auto";
        }
    });

});
        const slides = document.querySelectorAll('.slider-image');
        let currentSlide = 0;

        function showNextSlide() {
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
        }

        setInterval(showNextSlide, 5000); // Change every 5 seconds

        const cards = document.querySelectorAll('.card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.2 });
        cards.forEach(card => observer.observe(card));
    </script>

</body>

</html>

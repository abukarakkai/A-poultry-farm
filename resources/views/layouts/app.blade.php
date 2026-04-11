<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Poultry Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- <body class="bg-gray-50 flex h-screen overflow-hidden"> -->
<body class="{{ setting('theme') === 'dark' ? 'dark bg-gray-900 text-white' : 'bg-gray-100 text-gray-800' }} flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-300 hidden md:flex flex-col transition-all duration-300 z-40">
        <div class="px-4 py-6 flex flex-col gap-3">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 border-r-4 border-yellow-600 bg-yellow-50 text-yellow-600 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l9-9 9 9v8a3 3 0 0 1-3 3h-3v-6h-6v6H6a3 3 0 0 1-3-3v-8z" />
                </svg>
                <span class="md:block hidden">Dashboard</span>
            </a>

            <a href="{{ route('pens.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 12l-8 5-8-5V7l8-5 8 5v5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12" />
                </svg>
                <span class="md:block hidden">Pens / Batches</span>

            </a>
            <a href="{{ route('records.index') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2-10h-8l-2 2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-3l-2-2z" />
                </svg>
                <span class="md:block hidden">Daily Records</span>
            </a> 

                  <!-- Sell Orders -->
            <a href="{{ route('sales.index') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <!-- Heroicon: Shopping Cart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8h12.2M7 13h10m-5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
                <span class="md:block hidden">Sale Orders</span>
            </a>


            <a href="{{ route('expenses.index') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <!-- Heroicon: Shopping Cart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 7v14h18V7M3 7l9 6 9-6" />
        </svg>

                <span class="md:block hidden">Expenses</span>
            </a>

            <a href="{{ route('reports.index') }}"
                class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <!-- Heroicon: Chart Bar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3v18h18M9 17v-6m4 6v-10m4 10v-4" />
                </svg>
                <span class="md:block hidden">Reports</span>
            </a>

    <a href=" {{ route('settings.index')}}"
        class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
        <!-- Heroicon: Cog -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
        </svg>
        <span class="md:block hidden">Settings</span>
      </a>

      <!-- <a href="/profile">Profile</a> -->

      @if(auth()->user()->isSuperAdmin())

    <a href="{{ route('users.index') }}" 
     class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">  

        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
        </svg>
        <span class="md:block hidden"> Manage Users</span>
    </a>
        @endif





            <!-- Daily Records -->
            <!-- Add the other links (Records, Orders, Expenses, Reports, Settings) in similar way -->
        </div>
    </aside>

    <!-- Mobile sidebar overlay and drawer -->
    <div id="mobileSidebar" class="fixed inset-0 z-50 bg-black/50 hidden md:hidden"></div>
    <aside id="mobileDrawer" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-300 transform -translate-x-full transition-transform duration-300 z-50 md:hidden">
        <div class="px-4 py-6 flex flex-col gap-3">
            <button id="closeMobileSidebar" class="mb-4 text-gray-700 text-lg font-bold">✕ Close</button>
            <!-- Add same links as desktop sidebar -->
        </div>

        <a href="{{ route('pens.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 12l-8 5-8-5V7l8-5 8 5v5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12" />
                </svg>
                <span class="md:block hidden">Pens / Batches</span>
        </a>

    <a href="{{ route('records.index') }}"
        class="flex items-center gap-3 px-4 py-3 hover:bg-yellow-50 text-gray-700 rounded-md transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12h6m-6 4h6m2-10h-8l-2 2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-3l-2-2z" />
        </svg>
        <span class="md:block hidden">Daily Records</span>
      </a> 

            <!-- Daily Records -->

        
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden md:ml-64">
        <!-- Top navbar -->
        <div class="flex items-center justify-between px-4 md:px-8 border-b border-gray-300 py-3 bg-white">
            <button id="mobileMenuBtn" class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <span class="text-xl font-bold text-yellow-600">@yield('page-title', 'Dashboard')</span>
            <div class="flex items-center gap-5 text-gray-500">
                <!-- <p>Hi! {{ auth()->user()->name }}</p> -->
                      <a href="/profile">Hi! {{ auth()->user()->name }}</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="border rounded-full text-sm px-4 py-1 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>

        <!-- Page content -->
        <main class="flex-1 overflow-y-auto p-6">
            {{ $slot }}
        </main>
    </div>

    <!-- Success Toast -->
<div id="successToast"
     class="fixed top-5 right-5 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg hidden items-center gap-3 z-50">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-5 w-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 13l4 4L19 7"/>

    </svg>

    <span id="toastMessage">Success</span>
</div>

    @vite('resources/js/app.js')
    <script>
        const sidebarLinks = document.querySelectorAll('#sidebar a, #mobileDrawer a');
        const mobileMenuBtn = document.getElementById("mobileMenuBtn");
        const mobileDrawer = document.getElementById("mobileDrawer");
        const mobileSidebar = document.getElementById("mobileSidebar");
        const closeMobileSidebar = document.getElementById("closeMobileSidebar");

        function setActiveLink(hash) {
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === hash) {
                    link.classList.add('border-r-4', 'md:border-r-[6px]', 'bg-yellow-50', 'text-yellow-600', 'border-yellow-600');
                } else {
                    link.classList.remove('border-r-4', 'md:border-r-[6px]', 'bg-yellow-50', 'text-yellow-600', 'border-yellow-600');
                    link.classList.add('hover:bg-yellow-50', 'text-gray-700');
                }
            });
        }
        sidebarLinks.forEach(link => {
            link.addEventListener('click', e => {
                const hash = link.getAttribute('href');
                setActiveLink(hash);
                mobileDrawer.classList.add('-translate-x-full');
                mobileSidebar.classList.add('hidden');
            });
        });
        setActiveLink('#dashboard');

        mobileMenuBtn.addEventListener("click", () => {
            mobileDrawer.classList.remove("-translate-x-full");
            mobileSidebar.classList.remove("hidden");
        });
        closeMobileSidebar.addEventListener("click", () => {
            mobileDrawer.classList.add("-translate-x-full");
            mobileSidebar.classList.add("hidden");
        });
        mobileSidebar.addEventListener("click", () => {
            mobileDrawer.classList.add("-translate-x-full");
            mobileSidebar.classList.add("hidden");
        });


        // <Toast scricpt>

function showToast(message){

    const toast = document.getElementById('successToast');
    const msg = document.getElementById('toastMessage');

    msg.innerText = message;

    toast.classList.remove('hidden');

    setTimeout(()=>{
        toast.classList.add('hidden');
    },3000);
}

    </script>
</body>
</html>
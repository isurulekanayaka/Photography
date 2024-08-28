<body class="bg-black">
    <div class="bg-black">
        <nav class="relative px-4 py-4 flex justify-between items-center bg-black w-[1275px] mx-auto">
            <div class="flex justify-between w-screen px-5">
                <div>
                    <a class="text-3xl font-bold leading-none" href="{{ route('home') }}">
                        <h1 class="text-white">YOUR <span class="text-orange-500">LOGO</span></h1>
                        {{-- <img src="{{ asset('images/logo.png') }}" alt="LOGO" class="w-36"> --}}
                    </a>
                </div>

                <div class="lg:hidden mr-4">
                    <button class="navbar-burger flex items-center text-orange-500 p-3">
                        <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Mobile menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <ul
                class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:w-auto lg:space-x-16">
                <li><a class="flex justify-center items-center py-4 hover:border-b text-base border-orange-500 hover:text-orange-500 cursor-pointer text-white group"
                        href="{{ route('home') }}">Home</a></li>
                <li><a class="flex justify-center items-center py-4 hover:border-b text-base border-orange-500 hover:text-orange-500 cursor-pointer text-white group"
                        href="{{ route('photographers') }}">Photographers</a></li>
                <li><a class="flex justify-center items-center py-4 hover:border-b text-base border-orange-500 hover:text-orange-500 cursor-pointer text-white group"
                        href="{{ route('about') }}">About</a></li>
                <li><a class="flex justify-center items-center py-4 hover:border-b text-base border-orange-500 hover:text-orange-500 cursor-pointer text-white group"
                        href="{{ route('contact') }}">Contact Us</a></li>
            </ul>

            <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold text-nowrap rounded-xl transition duration-200"
                href="{{ route('login') }}">Sign in</a>
        </nav>
    </div>

    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="{{ route('home') }}">
                    <h1 class="text-black">YOUR <span class="text-orange-500">LOGO</span></h1>
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-black cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-black hover:bg-orange-50 hover:text-orange-500 rounded"
                            href="{{ route('home') }}">Home</a></li>
                    <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-black hover:bg-orange-50 hover:text-orange-500 rounded"
                            href="{{ route('photographers') }}">Photographers</a></li>
                    <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-black hover:bg-orange-50 hover:text-orange-500 rounded"
                            href="{{ route('about') }}">About</a></li>
                    <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-black hover:bg-orange-50 hover:text-orange-500 rounded"
                            href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-orange-500 hover:text-white rounded-xl"
                        href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </nav>
    </div>
</body>

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>

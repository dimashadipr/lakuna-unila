@if ($using)
    <nav class="w-full text-secondary bg-transparent top-0 z-40 pt-2 ease-in duration-500">
        <div class="container mx-auto px-4 max-w-7xl flex justify-between">
            <div class="flex flex-row gap-1 items-center py-3 md:py-2">
                <a data-aos="fade-right" href="/" class="flex items-center" aria-label="Go to home">
                    <img class="h-12 sm:h-14 transition-all ease-out duration-1000"
                        src="{{ asset('assets/logo/logo.png') }}" alt="Lakuna Unila">
                    <span class="hidden md:block text-xl font-bold ml-2 text-blue-500">Lakuna Unila</span>
                </a>
            </div>
            <div class="flex items-center gap-3 ml-6">
                <ul
                    class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6 lg:md:-x-8 navbar-nav">
                    <li class="group nav-item">
                        <a href="#beranda"
                            class="hidden md:inline-flex items-center gap-1 px-3 py-2 rounded-lg font-bold ">Beranda</a>
                        <div
                            class="h-0.5 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out">
                        </div>
                    </li>
                    <li class="group nav-item">
                        <a href="#info"
                            class="hidden md:inline-flex items-center gap-1 px-3 py-2 rounded-lg font-bold ">Info</a>
                        <div
                            class="h-0.5 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out">
                        </div>
                    </li>
                    <li class="group nav-item">
                        <a href="#faq"
                            class="hidden md:inline-flex items-center gap-1 px-3 py-2 rounded-lg font-bold ">Faq</a>
                        <div
                            class="h-0.5 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out">
                        </div>
                    </li>
                    <li class="group nav-item">
                        <a href="#loker"
                            class="hidden md:inline-flex items-center gap-1 px-3 py-2 rounded-lg font-bold ">Info Loker</a>
                        <div
                            class="h-0.5 bg-blue-500 scale-x-0 group-hover:scale-100 transition-transform origin-left rounded-full duration-300 ease-out">
                        </div>
                    </li>
                </ul>
                @auth
                    <div class="relative inline-block text-left group">
                        <button type="button"
                            class="inline-flex justify-center items-center space-x-2 px-4 py-2 text-secondary rounded-md"
                            id="user-menu" aria-haspopup="true" aria-expanded="true">
                            <span class="font-bold">{{ Str::before(auth()->user()->name, ' ') }}</span>
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </button>
                        <ul class="absolute hidden group-hover:block right-0 w-48 bg-base-100 rounded-lg shadow-lg py-1"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <li>
                                @if (auth()->user()->role == 'ALUMNI')
                                    <a href="{{ route('alumni') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-semibold"
                                        role="menuitem">Form Kuisioner</a>
                                @else
                                    <a href="{{ route('admin') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-semibold"
                                        role="menuitem">Dashboard</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-semibold"
                                    role="menuitem">Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- <a href="{{ route('alumni.login') }}" class="md:ml-5 btn btn-primary font-bold">Login</a> --}}
                    <button type="button" data-modal-target="login-modal" data-modal-toggle="login-modal"
                        class="md:ml-5 btn btn-primary font-bold">Login</button>
                @endauth
            </div>
        </div>
    </nav>
@endif

<div id="login-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full transition-all duration-1000">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Backdrop blur -->
        <div class="fixed inset-0 bg-gray-800 opacity-50 backdrop-filter backdrop-blur"></div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-xl transition-all duration-1000">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-blue-200 hover:text-blue-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="login-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="px-6 py-4 rounded-t">
                <h3 class="font-semibold text-gray-500 lg:text-xl">
                    Ingin Masuk Sebagai Apa?
                </h3>
            </div>
            <div class="px-6">
                <hr>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Login ke akun anda, agar
                    dapat terhubung dengan tracer study.</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="{{ route('login') }}"
                            class="flex items-center p-3 text-base font-bold text-black rounded-lg bg-blue-50 hover:bg-blue-100 group hover:shadow">
                            <i class='bx bxs-graduation'></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Sebagai
                                Alumni</span>
                            <span
                                class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded">
                                Alumni Univeristas Unila</span>
                        </a>
                    </li>
                </ul>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>

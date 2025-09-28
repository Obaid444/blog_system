<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Logo / Brand -->
            <a href="{{ url('/') }}" class="text-gray-900 font-bold text-lg tracking-wide hover:text-gray-700 no-underline">
Blog_System            </a>

           <!-- Desktop Nav -->
<div class="hidden sm:flex sm:items-center sm:space-x-6">
    <a href="{{ route('posts.index') }}" 
       class="text-gray-800 hover:text-gray-600 transition-colors no-underline">Posts</a>

    @auth
        <a href="{{ route('posts.create') }}" 
           class="text-gray-800 hover:text-gray-600 transition-colors no-underline">Create Post</a>

        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button class="text-gray-700 hover:bg-gray-400 text-dark px-3 py-1 rounded-md transition">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" 
           class="bg-blue-600 text-white font-semibold px-3 py-1 rounded-md hover:bg-blue-700 transition">
            Login
        </a>
        <a href="{{ route('register') }}" 
           class="bg-yellow-400 text-gray-900 font-semibold px-3 py-1 rounded-md hover:bg-yellow-500 transition">
            Register
        </a>
    @endauth
</div>


            <!-- Mobile Hamburger -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" type="button"
                        class="p-2 rounded-md text-white hover:bg-blue-500 focus:outline-none">
                    <!-- Icon changes -->
                    <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="sm:hidden px-4 pt-2 pb-3 space-y-2 bg-gray-200 shadow-md rounded-b-lg">

        <a href="{{ route('posts.index') }}" class="block text-dark hover:text-yellow-300 no-underline">Posts</a>

        @auth
            <a href="{{ route('posts.create') }}" class="block text-dark hover:text-yellow-300 no-underline">Create Post</a>
            <span class="block text-gray-200">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left bg-gray-400 hover:bg-gray-600 text-dark px-3 py-1 rounded-md transition">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block bg-white text-blue-700 font-semibold px-3 py-1 rounded-md hover:bg-gray-200 transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="block bg-yellow-400 text-gray-900 font-semibold px-3 py-1 rounded-md hover:bg-yellow-500 transition">
                Register
            </a>
        @endauth
    </div>
</nav>

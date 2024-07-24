<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav>
            <a href="{{ route('bells.index') }}" class="nav-link text-lg font-semibold">
                <img src="{{ asset('images/golden-bell.png')}}" alt="Logo" class="h-14 w-auto">
            </a>

            <div class="flex items-center gap-4">
                <a href="#" class="nav-link">Ring</a>
                <a href="#" class="nav-link">Listen</a>
                <a href="#" class="nav-link">Echo</a>
                <a href="#" class="nav-link">Mute</a>
                <a href="#" class="nav-link">Bell History</a>
                @auth
                    <div class="relative grid place-items-center"
                    x-data="{ open: false }">
    
                        <button @click="open = !open" type="button" class="round-btn">
                            <img src="https://picsum.photos/200" alt="" class="h-6 w-auto">
                        </button>
                        {{-- Dropdown Menu --}}
                        <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                            <p class="p-4">{{ auth()->user()->username }}</p>
                            <div class="border-b"></div>
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block p-4 hover:bg-slate-100">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block p-4 hover:bg-slate-100">Notifications</a>
                                </li>
                                <li>
                                    <a href="#" class="block p-4 hover:bg-slate-100">Settings</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block w-full p-4 hover:bg-slate-100 text-left">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endguest
            </div>
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
</body>
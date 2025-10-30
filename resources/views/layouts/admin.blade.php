<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}" dir="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FastMenu Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @if(app()->getLocale()==='ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @endif
    <style>
        :root{
            --color-primary:#465048;
            --color-accent:#BD906F;
            --color-secondary:#C0B283;
            --color-cream:#F3F1E5;
            --color-primaryDark:#2B3330;
            --color-accentDark:#A87A5B;
            --color-secondaryDark:#9C8F6A;
            --color-creamDark:#E8E6DA;
        }
        body{ font-family: {{ app()->getLocale()==='ar' ? "'Cairo', sans-serif" : "'Montserrat', 'Cairo', sans-serif" }}; background-color:#465048; }
    </style>
</head>
<body>
    <nav class="bg-[color:var(--color-primaryDark)] text-[color:var(--color-creamDark)] shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-14">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('storage/logo.png') }}" alt="FastMenu Admin" class="h-8 w-auto">
                    <h1 class="text-lg font-semibold">{{ __('admin.dashboard') }}</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.products.index') }}" class="hover:text-[color:var(--color-accent)]">{{ __('admin.products') }}</a>
                    <a href="{{ route('admin.categories.index') }}" class="hover:text-[color:var(--color-accent)]">{{ __('admin.categories') }}</a>
                    <a href="{{ route('home') }}" class="hover:text-[color:var(--color-accent)]" target="_blank">
                        <i class="fas fa-external-link-alt mr-1"></i>{{ __('admin.viewSite') }}
                    </a>
                    <div class="relative group">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-[color:var(--color-secondaryDark)]/40 hover:bg-[color:var(--color-primary)]">
                            <i class="fa-solid fa-globe"></i>
                            <span class="text-sm">{{ strtoupper(app()->getLocale()) }}</span>
                        </button>
                        <div class="absolute right-0 mt-2 bg-[color:var(--color-primaryDark)] border border-[color:var(--color-accent)] rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 min-w-[90px]">
                            <a href="{{ route('lang.switch','en') }}" class="block px-4 py-2 hover:bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] text-sm {{ app()->getLocale()==='en' ? 'bg-[color:var(--color-accent)]/50' : '' }}">EN</a>
                            <a href="{{ route('lang.switch','ar') }}" class="block px-4 py-2 hover:bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] text-sm {{ app()->getLocale()==='ar' ? 'bg-[color:var(--color-accent)]/50' : '' }}">AR</a>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-[color:var(--color-secondaryDark)]/40 hover:bg-[color:var(--color-primary)]">
                            <i class="fas fa-sign-out-alt"></i> <span>{{ __('admin.logout') }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 px-4 text-[color:var(--color-creamDark)]">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>

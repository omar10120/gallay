<footer class="mt-16" style="background-color:#465048; color: var(--color-creamDark);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
        <h2 class="text-lg sm:text-xl lg:text-xl font-semibold leading-relaxed mb-8">
            {{ __('footer.tagline') }}
        </h2>

        <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-14 text-lg">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-location-dot text-[color:var(--color-accent)]"></i>
                <span>{{ __('footer.address') }}</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fa-regular fa-envelope text-[color:var(--color-accent)]"></i>
                <span>fastmenus@gmail.com</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-phone-volume text-[color:var(--color-accent)]"></i>
                <span>4305 492 54 971+</span>
            </div>
        </div>

        <div class="mt-12 text-sm opacity-80">
            <div>{{ __('footer.allRightsReserved') }} {{ date('Y') }} ©</div>
            <div class="mt-2">{{ __('footer.directedBy') }} <a href="https://etechnocode.com" class="underline hover:text-[color:var(--color-accent)]" target="_blank" rel="noreferrer">etechnocode.com</a></div>
        </div>
    </div>
</footer>


<header class="w-full bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)] border-b border-[color:var(--color-primary)]">
    <style>
        @keyframes fadeDown { from { opacity: 0; transform: translateY(-8px);} to { opacity: 1; transform: translateY(0);} }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(8px);} to { opacity: 1; transform: translateY(0);} }
    </style>
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-3 sm:py-4">
        <div class="flex items-center justify-between" style="animation: fadeDown .5s ease-out both;">
            <div class="flex items-center gap-3 sm:gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center">
                    <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-9 sm:h-12 w-auto rounded-md shadow transition-transform duration-300 hover:scale-105" />
                </a>
            </div>

            <!-- Desktop pills -->
            <div class="hidden md:flex items-center gap-4">
                <div class="flex items-center gap-3 bg-[color:var(--color-primary)] text-[color:var(--color-cream)] rounded-xl px-4 py-2 shadow transition-transform duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                    <div class="text-xs opacity-80">{{ __('common.workingHours') }}</div>
                    <div class="font-semibold">{{ __('common.hours') }}</div>
                    <div class="w-8 h-8 rounded-full bg-[color:var(--color-accent)]/20 flex items-center justify-center text-[color:var(--color-accent)]">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-[color:var(--color-primary)] text-[color:var(--color-cream)] rounded-xl px-4 py-2 shadow transition-transform duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                    <div class="text-xs opacity-80">{{ __('common.email') }}</div>
                    <div class="font-semibold">fastmenus@gmail.com</div>
                    <div class="w-8 h-8 rounded-full bg-[color:var(--color-accent)]/20 flex items-center justify-center text-[color:var(--color-accent)]">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                </div>
            </div>

            <!-- Mobile hamburger -->
            <button id="mobileMenuBtn" aria-expanded="false" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg border border-[color:var(--color-secondaryDark)]/40 text-[color:var(--color-secondary)] hover:bg-[color:var(--color-primary)] transition">
                <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                    <g id="icon-ham" class="transition-all duration-300 origin-center">
                        <rect x="4" y="6" width="16" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="4" y="11" width="16" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="4" y="16" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </g>
                    <g id="icon-close" class="transition-all duration-300 origin-center scale-0 rotate-45">
                        <rect x="5" y="11" width="14" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="5" y="11" width="14" height="2" rx="1" fill="currentColor" transform="rotate(90 12 12)"></rect>
                    </g>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation row -->
    <div class="w-full border-t border-[color:var(--color-secondaryDark)]/30">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-4 relative" style="animation: fadeUp .5s ease-out .1s both;">
            <!-- Desktop icons -->
            <ul class="hidden md:grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-10 gap-6 text-center text-[color:var(--color-secondaryDark)]">
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-regular fa-envelope text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('header.email') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-brands fa-snapchat text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('header.snapchat') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-brands fa-instagram text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('header.instagram') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    <a href="https://wa.me/+8613610009048" target="_blank" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('header.whatsapp') }}</a>
                </li>
            
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-brands fa-facebook-f text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('header.facebook') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-phone text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('common.contact') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-percent text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('common.offers') }}</a>
                </li>
                <li class="flex flex-col items-center gap-2 transition-transform hover:-translate-y-0.5 relative group">
                    <i class="fa-solid fa-globe text-xl cursor-pointer"></i>
                    <div class="text-sm cursor-pointer">{{ strtoupper(app()->getLocale()) }}</div>
                    <div class="absolute top-full mt-2 bg-[color:var(--color-primaryDark)] border border-[color:var(--color-accent)] rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 min-w-[80px]">
                        <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 hover:bg-[color:var(--color-accent)] text-[color:var(--color-secondary)] text-sm {{ app()->getLocale() === 'en' ? 'bg-[color:var(--color-accent)]/50' : '' }}">EN</a>
                        <a href="{{ route('lang.switch', 'ar') }}" class="block px-4 py-2 hover:bg-[color:var(--color-accent)] text-[color:var(--color-secondary)] text-sm {{ app()->getLocale() === 'ar' ? 'bg-[color:var(--color-accent)]/50' : '' }}">AR</a>
                    </div>
                </li>
                <li class="flex flex-col items_center gap-2 transition-transform hover:-translate-y-0.5">
                    <i class="fa-regular fa-building text-xl"></i>
                    <a href="#" class="hover:text-[color:var(--color-accent)] text-sm">{{ __('common.home') }}</a>
                </li>
            </ul>

            <!-- Mobile menu panel -->
            <div id="mobileMenuPanel" class="md:hidden pointer-events-none opacity-0 -translate-y-2 absolute left-0 right-0 top-full rounded-xl border border-[color:var(--color-secondaryDark)]/30 bg-[color:var(--color-primaryDark)]/95 backdrop-blur p-3 text-[color:var(--color-secondary)] transition-all duration-300 z-50">
                <div class="grid grid-cols-4 gap-3 text-center text-xs">
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-regular fa-envelope "></i><span>{{ __('header.email') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-brands fa-snapchat"></i><span>{{ __('header.snapchat') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-brands fa-instagram"></i><span>{{ __('header.instagram') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-brands fa-whatsapp"></i><span>{{ __('header.whatsapp') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-brands fa-facebook-f"></i><span>{{ __('header.facebook') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-solid fa-phone"></i><span>{{ __('common.contact') }}</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-1 py-2 rounded-lg hover:bg-[color:var(--color-primary)] transition text-[color:var(--color-secondary)]">
                        <i class="fa-solid fa-percent"></i><span>{{ __('common.offers') }}</span>
                    </a>
                    <div class="flex flex-col items-center gap-1 py-2 rounded-lg">
                        <i class="fa-solid fa-globe"></i>
                        <div class="flex gap-2 text-[color:var(--color-secondary)]">
                            <a class="underline" href="{{ route('lang.switch', 'en') }}">EN</a>
                            <a class="underline" href="{{ route('lang.switch', 'ar') }}">AR</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobileMenuSpacer" class="md:hidden h-0 transition-all duration-300"></div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const btn = document.getElementById('mobileMenuBtn');
  const panel = document.getElementById('mobileMenuPanel');
  const ham = document.getElementById('icon-ham');
  const closeIc = document.getElementById('icon-close');
  const spacer = document.getElementById('mobileMenuSpacer');
  if(!btn || !panel) return;
  const open = () => {
    btn.setAttribute('aria-expanded', 'true');
    panel.classList.remove('pointer-events-none','opacity-0','-translate-y-2','absolute');
    panel.classList.add('pointer-events-auto','opacity-100','translate-y-0','relative');
    if (spacer) spacer.style.height = '0px';
    ham.classList.add('scale-0','-rotate-45');
    closeIc.classList.remove('scale-0');
    closeIc.classList.add('scale-100');
  };
  const close = () => {
    btn.setAttribute('aria-expanded', 'false');
    panel.classList.add('pointer-events-none','opacity-0','-translate-y-2','absolute');
    panel.classList.remove('pointer-events-auto','opacity-100','translate-y-0','relative');
    if (spacer) spacer.style.height = '0px';
    ham.classList.remove('scale-0','-rotate-45');
    closeIc.classList.add('scale-0');
    closeIc.classList.remove('scale-100');
  };
  let isOpen = false;
  btn.addEventListener('click', () => {
    isOpen ? close() : open();
    isOpen = !isOpen;
  });
});
</script>


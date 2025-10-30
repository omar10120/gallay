<div class="hidden md:block fixed right-3 md:right-5 top-1/2 -translate-y-1/2 z-40 select-none">
  <ul class="flex flex-col gap-4">
    <li class="group relative">
      <div class="absolute inset-0 rounded-2xl blur-lg opacity-50 group-hover:opacity-90 transition" style="background: radial-gradient(60% 60% at 50% 50%, rgba(189,144,111,0.6), rgba(189,144,111,0.05));"></div>
      <a href="#" aria-label="Instagram" class="relative block w-14 h-14 rounded-2xl overflow-hidden ring-2 ring-[color:var(--color-accent)]/50 shadow-[0_10px_25px_rgba(0,0,0,0.35)] hover:shadow-[0_14px_30px_rgba(189,144,111,0.45)] transition-transform hover:-translate-y-0.5"
         style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);">
        <div class="absolute inset-0 backdrop-blur-[2px]"></div>
        <div class="relative w-full h-full grid place-items-center text-white text-2xl">
          <i class="fa-brands fa-instagram"></i>
        </div>
      </a>
      <span class="pointer-events-none absolute right-full mr-2 top-1/2 -translate-y-1/2 text-xs px-2 py-1 rounded-md bg-[color:var(--color-primaryDark)] text-[color:var(--color-creamDark)] opacity-0 translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition">Instagram</span>
    </li>

    <li class="group relative">
      <div class="absolute inset-0 rounded-2xl blur-lg opacity-40 group-hover:opacity-80 transition" style="background: radial-gradient(60% 60% at 50% 50%, rgba(255,252,0,0.6), rgba(255,252,0,0.05));"></div>
      <a href="#" aria-label="Snapchat" class="relative block w-14 h-14 rounded-2xl overflow-hidden ring-2 ring-yellow-300/60 shadow-[0_10px_25px_rgba(0,0,0,0.35)] hover:shadow-[0_14px_30px_rgba(255,252,0,0.45)] transition-transform hover:-translate-y-0.5" style="background:#fffc00;">
        <div class="relative w-full h-full grid place-items-center text-black text-2xl">
          <i class="fa-brands fa-snapchat"></i>
        </div>
      </a>
      <span class="pointer-events-none absolute right_full mr-2 top-1/2 -translate-y-1/2 text-xs px-2 py-1 rounded-md bg-[color:var(--color-primaryDark)] text-[color:var(--color-creamDark)] opacity-0 translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition">Snapchat</span>
    </li>

    <li class="group relative">
      <div class="absolute inset-0 rounded-2xl blur-lg opacity-40 group-hover:opacity-80 transition" style="background: radial-gradient(60% 60% at 50% 50%, rgba(37,211,102,0.6), rgba(37,211,102,0.05));"></div>
      <a href="https://wa.me/+8613610009048" target="_blank" aria-label="WhatsApp" class="relative block w-14 h-14 rounded-2xl overflow-hidden ring-2 ring-emerald-400/60 shadow-[0_10px_25px_rgba(0,0,0,0.35)] hover:shadow-[0_14px_30px_rgba(37,211,102,0.45)] transition-transform hover:-translate-y-0.5" style="background:#25D366;">
        <div class="relative w-full h-full grid place-items-center text-white text-2xl">
          <i class="fa-brands fa-whatsapp"></i>
        </div>
      </a>
      <span class="pointer-events-none absolute right-full mr-2 top-1/2 -translate-y-1/2 text-xs px-2 py-1 rounded-md bg-[color:var(--color-primaryDark)] text-[color:var(--color-creamDark)] opacity-0 translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition">WhatsApp</span>
    </li>
  </ul>
</div>

<!-- Mobile FAB (bottom-right) -->
<div class="md:hidden fixed right-4 bottom-5 z-40 select-none">
  <div class="relative w-16 h-16">
    <!-- satellites -->
    <a href="#" aria-label="Instagram" id="satIg" class="pointer-events-none opacity-0 absolute inset-0 w-12 h-12 -translate-x-2 -translate-y-2 rounded-full grid place-items-center text-white shadow-lg"
       style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%); transition: transform .35s cubic-bezier(.2,.8,.2,1), opacity .2s;">
      <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="#" aria-label="Snapchat" id="satSc" class="pointer-events-none opacity-0 absolute inset-0 w-12 h-12 -translate-x-2 -translate-y-2 rounded-full grid place-items-center text-black shadow-lg"
       style="background:#fffc00; transition: transform .35s cubic-bezier(.2,.8,.2,1), opacity .2s;">
      <i class="fa-brands fa-snapchat"></i>
    </a>
    <a href="https://wa.me/+8613610009048" target="_blank" aria-label="WhatsApp" id="satWa" class="pointer-events-none opacity-0 absolute inset-0 w-12 h-12 -translate-x-2 -translate-y-2 rounded-full grid place-items-center text-white shadow-lg"
       style="background:#25D366; transition: transform .35s cubic-bezier(.2,.8,.2,1), opacity .2s;">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- main fab -->
    <button id="socialFab" aria-expanded="false" class="absolute right-0 bottom-0 w-16 h-16 rounded-2xl grid place-items-center text-[color:var(--color-creamDark)] shadow-[0_10px_25px_rgba(0,0,0,.35)] ring-2 ring-[color:var(--color-accent)]/60"
            style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primaryDark) 100%); transition: transform .25s;">
      <i id="fabIcon" class="fa-solid fa-plus text-xl transition-transform duration-300"></i>
    </button>
  </div>
</div>

<script>
  (function(){
    const fab = document.getElementById('socialFab');
    const ig = document.getElementById('satIg');
    const sc = document.getElementById('satSc');
    const wa = document.getElementById('satWa');
    const icon = document.getElementById('fabIcon');
    if(!fab || !ig || !sc || !wa) return;
    let open = false;
    function setState(isOpen){
      fab.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      icon.style.transform = isOpen ? 'rotate(45deg)' : 'rotate(0deg)';
      [ig,sc,wa].forEach(el=>{
        el.style.pointerEvents = isOpen ? 'auto' : 'none';
        el.style.opacity = isOpen ? '1' : '0';
      });
      if(isOpen){
        // position in a fan
        ig.style.transform = 'translate(-72px,-6px)';
        sc.style.transform = 'translate(-52px,-52px)';
        wa.style.transform = 'translate(-6px,-72px)';
      } else {
        ig.style.transform = 'translate(-8px,-8px)';
        sc.style.transform = 'translate(-8px,-8px)';
        wa.style.transform = 'translate(-8px,-8px)';
      }
    }
    setState(false);
    fab.addEventListener('click', ()=>{ open = !open; setState(open); });
  })();
</script>


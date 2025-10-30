@php
    $defaultCategories = ['All'];
    $list = isset($categories) && is_array($categories) && count($categories) ? array_merge($defaultCategories, $categories) : $defaultCategories;
    $active = request('category', 'All');
    $slugify = function($text){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    };
@endphp

<div class="w-full">
    <div class="flex flex-wrap gap-3 items-center w-full justify-center">
        @foreach($list as $cat)
            @php($isActive = ($cat === 'All' && ($active==='All' || !$active)) || ($slugify($cat) === strtolower($active)))
            @php($param = $cat === 'All' ? null : $slugify($cat))
            <a href="{{ $param ? url()->current() . '?category=' . $param : url()->current() }}"
               class="relative px-4 py-2 rounded-lg border font-medium transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md hover:ring-2 hover:ring-[color:var(--color-accent)]/60 backdrop-blur-sm"
               style="
                    border-color: var(--color-accent);
                    color: {{ $isActive ? 'var(--color-creamDark)' : 'var(--color-creamDark)' }};
                    background: {{ $isActive ? 'var(--color-accent)' : 'rgba(0,0,0,0.08)' }};
               "
            >
                {{ $cat }}
            </a>
        @endforeach
    </div>
</div>


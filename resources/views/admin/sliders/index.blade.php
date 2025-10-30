@extends('layouts.admin')

@section('title', __('admin.sliders'))

@section('content')
<div class="flex justify_between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">Slider</h2>
    <a href="{{ route('admin.sliders.create') }}" class="bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:opacity-90">
        <i class="fas fa-plus mr-2"></i>Add Slide
    </a>
</div>

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg overflow-hidden border border-[color:var(--color-secondaryDark)]/40">
    <table class="min-w-full">
        <thead class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)]">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Product</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Position</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Active</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-[color:var(--color-secondaryDark)]/30 text-[color:var(--color-creamDark)]">
            @forelse($items as $item)
            <tr>
                <td class="px-6 py-4">
                    @if($item->product && $item->product->image)
                        <img src="{{ asset('storage/'.$item->product->image) }}" class="h-12 w-12 rounded object-fit" alt="">
                    @endif
                </td>
                <td class="px-6 py-4">{{ $item->product?->name }}</td>
                <td class="px-6 py-4">{{ $item->position }}</td>
                <td class="px-6 py-4">{{ $item->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('admin.sliders.destroy', $item) }}" onsubmit="return confirm('Remove this slide?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-300"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-6 text-center opacity-70">No slides.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection



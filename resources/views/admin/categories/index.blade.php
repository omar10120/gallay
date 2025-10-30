@extends('layouts.admin')

@section('title', 'Categories - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">{{ __('admin.categories') }}</h2>
    <a href="{{ route('admin.categories.create') }}" class="bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:opacity-90">
        <i class="fas fa-plus mr-2"></i>{{ __('admin.addCategory') }}
    </a>
    </div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg overflow-hidden border border-[color:var(--color-secondaryDark)]/40">
    <table class="min-w-full">
        <thead class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)]">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.name') }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.price') === 'Price' ? 'Slug' : 'المعرف' }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-[color:var(--color-secondaryDark)]/30 text-[color:var(--color-creamDark)]">
            @forelse($categories as $category)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap opacity-80">{{ $category->slug }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-[color:var(--color-creamDark)] hover:text-[color:var(--color-accent)]"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-[color:var(--color-creamDark)]/70">{{ __('admin.noCategories') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($categories->hasPages())
    <div class="mt-6">{{ $categories->links() }}</div>
@endif
@endsection



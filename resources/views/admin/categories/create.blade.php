@extends('layouts.admin')

@section('title', 'Create Category - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">{{ __('admin.createCategory') }}</h2>
    <a href="{{ route('admin.categories.index') }}" class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:bg-[color:var(--color-accent)]"><i class="fas fa-arrow-left mr-2"></i>{{ __('admin.back') }}</a>
</div>

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 border border-[color:var(--color-secondaryDark)]/40">
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">{{ __('admin.name') }} *</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]" required>
                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">{{ __('admin.slug') }}</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]" placeholder="auto if empty">
                @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.categories.index') }}" class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accent)]">{{ __('admin.cancel') }}</a>
            <button type="submit" class="bg-[color:var(--color-accent)] text-[color:var(--color-primaryDark)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accentDark)]"><i class="fas fa-save mr-2"></i>{{ __('admin.create') }}</button>
        </div>
    </form>
 </div>
@endsection



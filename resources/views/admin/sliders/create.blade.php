@extends('layouts.admin')

@section('title', 'Add Slide - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">Add Slide</h2>
    <a href="{{ route('admin.sliders.index') }}" class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md">Back</a>
 </div>

 <div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 border border-[color:var(--color-secondaryDark)]/40">
    <form method="POST" action="{{ route('admin.sliders.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm mb-2">Product *</label>
                <select name="product_id" class="w-full px-3 py-2 rounded border border-[color:var(--color-secondaryDark)]/40 bg-transparent text-[color:var(--color-secondary)]">
                    @foreach($products as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
                @error('product_id')<div class="text-red-400 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm mb-2">Position</label>
                <input type="number" name="position" value="0" class="w-full px-3 py-2 rounded border border-[color:var(--color-secondaryDark)]/40 bg-transparent text-[color:var(--color-secondary)]" />
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2">
            <input id="is_active" type="checkbox" name="is_active" value="1" checked class="accent-[color:var(--color-accent)]">
            <label for="is_active" class="text-sm">Active</label>
        </div>
        <div class="mt-8">
            <button class="bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] px-6 py-2 rounded hover:opacity-90">Save</button>
        </div>
    </form>
 </div>
@endsection



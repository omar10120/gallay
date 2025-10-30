@extends('layouts.admin')

@section('title', 'Products - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">Products</h2>
    <a href="{{ route('admin.products.create') }}" 
       class="bg-[color:var(--color-accent)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:opacity-90">
        <i class="fas fa-plus mr-2"></i>{{ __('admin.addProduct') }}
    </a>
</div>

<!-- Desktop Table View -->
<div class="hidden md:block bg-[color:var(--color-primaryDark)] shadow-md rounded-lg overflow-hidden border border-[color:var(--color-secondaryDark)]/40">
    <table class="min-w-full">
        <thead class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)]">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.image') }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.name') }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.price') }}</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-[color:var(--color-secondaryDark)]/30 text-[color:var(--color-creamDark)]">
            @forelse($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-12 w-12 rounded-lg object-cover">
                        @else
                            <div class="h-12 w-12 bg-[color:var(--color-primary)]/40 rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-[color:var(--color-creamDark)]/60"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium">{{ $product->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm">AED{{ number_format($product->price, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.products.show', $product) }}" 
                               class="text-[color:var(--color-creamDark)] hover:text-[color:var(--color-accent)]">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="text-[color:var(--color-creamDark)] hover:text-[color:var(--color-accent)]">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" 
                                  class="inline" 
                                  onsubmit="return confirm('{{ __('admin.confirmDeleteProduct') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-[color:var(--color-creamDark)]/70">
                        {{ __('admin.noProducts') }} <a href="{{ route('admin.products.create') }}" class="text-[color:var(--color-accent)] hover:underline">{{ __('admin.createFirstProduct') }}</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Mobile Card View -->
<div class="md:hidden space-y-4">
    @forelse($products as $product)
        <div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-4 border border-[color:var(--color-secondaryDark)]/40">
            <div class="flex items-start space-x-4">
                <!-- Product Image -->
                <div class="flex-shrink-0">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="h-16 w-16 rounded-lg object-cover">
                    @else
                        <div class="h-16 w-16 bg-[color:var(--color-primary)]/40 rounded-lg flex items-center justify-center">
                            <i class="fas fa-image text-[color:var(--color-creamDark)]/60"></i>
                        </div>
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-[color:var(--color-creamDark)] truncate">{{ $product->name }}</h3>
                    <div class="mt-1 flex items-center space-x-4 text-xs text-[color:var(--color-creamDark)]/70">
                        <span class="font-semibold text-[color:var(--color-accent)]">AED{{ number_format($product->price, 2) }}</span>
                        <span>{{ count($product->images ?? []) }} {{ __('admin.images') }}</span>
                    </div>
                    
                    <!-- Actions -->
                    <div class="mt-3 flex space-x-3">
                        <a href="{{ route('admin.products.show', $product) }}" 
                           class="text-[color:var(--color-creamDark)] hover:text-[color:var(--color-accent)] text-xs">
                            <i class="fas fa-eye mr-1"></i>{{ __('admin.view') }}
                        </a>
                        <a href="{{ route('admin.products.edit', $product) }}" 
                           class="text-[color:var(--color-creamDark)] hover:text-[color:var(--color-accent)] text-xs">
                            <i class="fas fa-edit mr-1"></i>{{ __('admin.edit') }}
                        </a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" 
                              class="inline" 
                              onsubmit="return confirm('{{ __('admin.confirmDeleteProduct') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 text-xs">
                                <i class="fas fa-trash mr-1"></i>{{ __('admin.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 text-center border border-[color:var(--color-secondaryDark)]/40">
            <div class="text-[color:var(--color-creamDark)]/70">
                <i class="fas fa-box-open text-3xl mb-3"></i>
                <p class="text-sm">{{ __('admin.noProducts') }}</p>
                <a href="{{ route('admin.products.create') }}" class="text-[color:var(--color-accent)] hover:text-[color:var(--color-accentDark)] text-sm mt-2 inline-block">
                    {{ __('admin.createFirstProduct') }}
                </a>
            </div>
        </div>
    @endforelse
</div>

@if($products->hasPages())
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif
@endsection

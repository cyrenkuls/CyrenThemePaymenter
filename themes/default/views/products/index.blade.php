<div class="grid md:grid-cols-4 gap-6">
    <div class="flex flex-col gap-4">
        <div class="mx-auto container">
            <h1 class="text-3xl font-bold text-base">{{ $category->name }}</h1>
            <article class="prose dark:prose-invert text-base">
                {!! $category->description !!}
            </article>
        </div>
        <div class="flex flex-col bg-background-secondary border border-neutral p-4 rounded-lg">
            @foreach ($categories as $ccategory)
                <a href="{{ route('category.show', ['category' => $ccategory->slug]) }}" wire:navigate
                    @if ($category->id == $ccategory->id) class="font-bold text-primary" @endif>
                    {{ $ccategory->name }}
                </a>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col gap-8 col-span-3">
        @if (count($childCategories) >= 1)
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($childCategories as $childCategory)
                    <div class="flex flex-col bg-background-secondary border border-neutral p-4 rounded-lg">
                        @if(theme('small_images', false))
                            <div class="flex gap-x-3 items-center">
                        @endif
                        @if ($childCategory->image)
                            <img src="{{ Storage::url($childCategory->image) }}" alt="{{ $childCategory->name }}"
                                class="rounded-md {{ theme('small_images', false) ? 'w-14 h-fit' : 'w-full object-cover object-center' }}">
                        @endif
                        <h2 class="text-xl font-bold text-base mt-2">{{ $childCategory->name }}</h2>
                        @if(theme('small_images', false))
                            </div>
                        @endif
                        @if(theme('show_category_description', true))
                            <article class="mt-2 prose dark:prose-invert text-base">
                                {!! $childCategory->description !!}
                            </article>
                        @endif
                        <a href="{{ route('category.show', ['category' => $childCategory->slug]) }}" wire:navigate class="mt-2">
                            <x-button.primary class="w-full">{{ __('general.view') }}</x-button.primary>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="flex flex-col bg-background-secondary border border-neutral p-4 rounded-lg">
                    @if(theme('small_images', false))
                        <div class="flex gap-x-3 items-center">
                    @endif
                    @if ($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="rounded-md {{ theme('small_images', false) ? 'w-14 h-fit' : 'w-full object-cover object-center' }}">
                    @endif
                    <h2 class="text-xl font-bold text-base mt-2">{{ $product->name }}</h2>
                    @if(theme('small_images', false))
                        </div>
                    @endif
                    <article class="prose dark:prose-invert text-base mt-2">
                        {!! $product->description !!}
                    </article>
                    <h3 class="text-lg font-semibold mb-2 mt-2">
                        {{ $product->price() }}
                    </h3>
                    @if (($product->stock > 0 || !$product->stock) && $product->price()->available && theme('direct_checkout', false))
                        <a href="{{ route('products.checkout', ['category' => $category, 'product' => $product->slug]) }}"
                            wire:navigate>
                            <x-button.primary class="w-full">{{ __('product.add_to_cart') }}</x-button.primary>
                        </a>
                    @else
                        <a href="{{ route('products.show', ['category' => $product->category, 'product' => $product->slug]) }}"
                            wire:navigate>
                            <x-button.primary class="w-full">
                                {{ __('general.view') }}
                            </x-button.primary>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

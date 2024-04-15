<div x-data="{ showMobileFilter: false }">

    <div class="w-full md:w-11/12 md:mx-auto">
        <div
        class="bg-cover bg-center bg-no-repeat min-h-[600px] flex flex-col justify-center items-center"
        style="background-image: url('{{ $collection->getFirstMediaUrl("cover") }}')"
        >
        <div class="flex justify-start py-10 md:py-16 w-11/12 mx-auto">
            <div
            class="text-white font-poppins flex flex-col gap-10 text-center"
            >
            <h1
                class="font-semibold text-[32px] md:text-[48px] leading-none md:leading-tight"
            >
            {{ $collection->title }}
            </h1>
            <p class="font-normal text-[16px] md:text-[18px]">
                {!! $collection->description !!} 
            </p>
            </div>
        </div>
        </div>
    </div>






    <main class="mx-auto max-w-2xl px-4 lg:max-w-7xl lg:px-8">
       
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">
                {{ $collection->title }}
            </h1>

            <div class="hidden lg:flex lg:items-center">
                <x-dropdown>
                    <x-slot:trigger>
                        <button
                            type="button"
                            class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            id="menu-button"
                            aria-expanded="false"
                            aria-haspopup="true"
                        >
                            {{ __('Display :resultCount per page', ['resultCount' => $this->perPage]) }}
                            <x-heroicon-m-chevron-down class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" />
                        </button>
                    </x-slot:trigger>
                    <x-slot:content>
                        <x-dropdown-link
                            role="button"
                            wire:click.prevent="$set('perPage', 12)"
                        >
                            {{ __('12') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            role="button"
                            wire:click.prevent="$set('perPage', 24)"
                        >
                            {{ __('24') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            role="button"
                            wire:click.prevent="$set('perPage', 36)"
                        >
                            {{ __('36') }}
                        </x-dropdown-link>
                    </x-slot:content>
                </x-dropdown>

                <x-dropdown trigger-classes="ml-5">
                    <x-slot:trigger>
                        <button
                            type="button"
                            class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            id="menu-button"
                            aria-expanded="false"
                            aria-haspopup="true"
                        >
                            {{ __('Sort by') }}
                            @if($sortBy === 'price' && $sortDirection === 'asc')
                                {{ __('Price: Low to High') }}
                            @elseif($sortBy === 'price' && $sortDirection === 'desc')
                                {{ __('Price: High to Low') }}
                            @elseif($sortBy === 'name' && $sortDirection === 'desc')
                                {{ __('Alphabetically, Z-A') }}
                            @else
                                {{ __('Alphabetically, A-Z') }}
                            @endif
                            <x-heroicon-m-chevron-down class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" />
                        </button>
                    </x-slot:trigger>
                    <x-slot:content>
                        <x-dropdown-link
                            role="button"
                            wire:click="applySorting('name', 'asc')"
                        >
                            {{ __('Alphabetically, A-Z') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            role="button"
                            wire:click="applySorting('name', 'desc')"
                        >
                            {{ __('Alphabetically, Z-A') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            role="button"
                            wire:click="applySorting('price', 'asc')"
                        >
                            {{ __('Price: Low to High') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            role="button"
                            wire:click="applySorting('price', 'desc')"
                        >
                            {{ __('Price: High to Low') }}
                        </x-dropdown-link>
                    </x-slot:content>
                </x-dropdown>
            </div>
        </div>

        <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
            @unless($products->count())
                <div class="text-center lg:col-span-3 xl:col-span-4">
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">
                        {{ __('No products') }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ __('There are no products in this collection.') }}
                    </p>
                    <div class="mt-6">
                        <a
                            href="{{ route('guest.products.list') }}"
                            class="btn btn-primary"
                        >
                            <x-heroicon-m-arrow-left class="-ml-0.5 mr-1.5 h-5 w-5" />
                            {{ __('Back to shop') }}
                        </a>
                    </div>
                </div>
            @else
                <aside>
                    <h2 class="sr-only">
                        {{ __('Filters') }}
                    </h2>

                    {{-- Mobile filter dialog toggle. --}}
                    <button
                        wire:click.prevent="showMobileFilter"
                        type="button"
                        class="inline-flex items-center lg:hidden"
                    >
                        <span class="text-sm font-medium text-slate-700">{{ __('Filters') }}</span>
                        <x-heroicon-m-plus class="ml-1 h-5 w-5 flex-shrink-0 text-slate-400" />
                    </button>

                    <div class="hidden lg:block">
                        <div class="space-y-10 divide-y divide-slate-200">
                            @foreach($this->productOptionValues->unique('label')->sortBy('option.name')->groupBy('option.name')->all() as $key => $data)
                                <div @class(['pt-10' => !$loop->first])>
                                    <fieldset>
                                        <legend class="block text-sm font-medium text-slate-900">
                                            {{ $key }}
                                        </legend>
                                        <div class="space-y-3 pt-6">
                                            @foreach($data as $value)
                                                @if($value->option->visual == 'color' || $value->option->visual == 'image')
                                                    <div
                                                        class="inline-flex"
                                                        data-tippy-content="{{ $value->label }}"
                                                        data-tippy-placement="bottom"
                                                    >
                                                        <label
                                                            for="optionValue-{{ $value->id }}"
                                                            class="block relative w-8 h-8"
                                                        >
                                                            <input
                                                                wire:model="filters.options"
                                                                type="checkbox"
                                                                id="optionValue-{{ $value->id }}"
                                                                value="{{ $value->label }}"
                                                                class="sr-only peer"
                                                            />
                                                            @if($value->option->visual == 'color')
                                                                <span
                                                                    class="inline-flex justify-center items-center w-full h-full rounded-full shadow bg-center bg-cover cursor-pointer duration-150"
                                                                    style="background-color: {{ $value->value }}"
                                                                ></span>
                                                            @else
                                                                <span
                                                                    class="inline-flex justify-center items-center w-full h-full rounded-full shadow bg-center bg-cover cursor-pointer duration-150"
                                                                    style="background-image: url('{{ $value->getFirstMediaUrl('image') }}')"
                                                                ></span>
                                                            @endif
                                                            <x-heroicon-m-check class="w-5 h-5 text-white absolute inset-0 m-auto z-0 pointer-events-none hidden peer-checked:block duration-150" />
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <x-input
                                                            wire:model="filters.options"
                                                            type="checkbox"
                                                            id="optionValue-{{ $value->id }}"
                                                            value="{{ $value->label }}"
                                                            class="h-4 w-4 !rounded !shadow-none"
                                                        />
                                                        <x-input-label
                                                            for="optionValue-{{ $value->id }}"
                                                            class="ml-3 !font-normal"
                                                        >
                                                            {{ $value->label }}
                                                        </x-input-label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </fieldset>
                                </div>
                            @endforeach

                            {{--Price--}}
                            <div
                                wire:ignore
                                x-data="
                                    {
                                        min: {{ $this->minPrice }},
                                        max: {{ $this->maxPrice }},
                                        selectedMin: @entangle('filters.price.min').defer,
                                        selectedMax: @entangle('filters.price.max').defer
                                    }
                                "
                                x-init="
                                    slider = noUiSlider.create($refs.slider, {
                                        start: [min, max],
                                        step: 1,
                                        format: {
                                            to: function (value) {
                                                return value.toFixed(0);
                                            },
                                            from: function (value) {
                                                return value;
                                            }
                                        },
                                        tooltips: [
                                            false,
                                            false
                                        ],
                                        connect: true,
                                        range: {
                                            'min': min,
                                            'max': max
                                        }
                                    });
                                    slider.on('slide', function (values, handle) {
                                        selectedMin = values[0];
                                        selectedMax = values[1];
                                    });
                                    slider.on('set', function (values, handle) {
                                        $wire.set('filters.price.min', values[0]);
                                        $wire.set('filters.price.max', values[1]);
                                    });
                                "
                                class="pt-10"
                            >
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-900">{{ __('Price') }}</legend>
                                    <div class="space-y-3 pt-6">
                                        <div
                                            x-ref="slider"
                                            class="slider-fit"
                                        ></div>
                                        <p class="text-center text-sm text-slate-700">
                                            {{ __('from') }} $<span x-text="selectedMin"></span>
                                            {{ __('to') }} $<span x-text="selectedMax"></span>
                                        </p>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </aside>

                <section
                    aria-labelledby="product-heading"
                    class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3"
                >
                    <h2
                        id="product-heading"
                        class="sr-only"
                    >
                        {{ __('Products') }}
                    </h2>

                    <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
                        @foreach($products as $product)
                            <div
                                wire:key="product-{{ $product->slug }}"
                                class="group relative flex flex-col overflow-hidden rounded-lg border border-slate-200 bg-white hover:border-sky-300 hover:shadow-lg hover:shadow-sky-300/50 transition duration-150"
                            >
                                <div class="aspect-w-3 aspect-h-4 group-hover:opacity-75 sm:aspect-none">
                                    @if($product->hasMedia('gallery'))
                                        {{ $product->getFirstMedia('gallery')('responsive')->attributes(['alt' => $product->name, 'class' => 'h-full w-full object-cover object-center sm:h-full sm:w-full']) }}
                                    @else
                                        <img
                                            src="{{ $product->getFirstMediaUrl('gallery') }}"
                                            alt="{{ $product->name }}"
                                            class="h-full w-full object-cover object-center sm:h-full sm:w-full"
                                        >
                                    @endif
                                </div>
                                <div class="flex flex-1 flex-col items-center text-center space-y-2 p-4">
                                    <h3 class="text-sm font-medium text-slate-900 line-clamp-2">
                                        <a href="{{ route('guest.products.detail', $product) }}">
                                            <span
                                                aria-hidden="true"
                                                class="absolute inset-0"
                                            ></span>
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    <ul
                                        role="list"
                                        class="flex items-center space-x-3"
                                    >
                                        @foreach($product->options as $option)
                                            @if($option->visual === 'color')
                                                @foreach($option->optionValues->take(5) as $optionValue)
                                                    <li
                                                        class="h-4 w-4 rounded-full border border-black border-opacity-10"
                                                        style="background-color: {{ $optionValue->value }}"
                                                    >
                                                        <span class="sr-only">{{ $optionValue->label }}</span>
                                                    </li>
                                                @endforeach
                                                @if($option->optionValues->count() > 5)
                                                    <li class="flex-shrink-0 text-xs font-medium leading-5">
                                                        +{{ $option->optionValues->count() - 5 }}
                                                    </li>
                                                @endif
                                            @elseif($option->visual === 'image')
                                                @foreach($option->optionValues->take(5) as $optionValue)
                                                    <li
                                                        class="h-4 w-4 rounded-full border border-black border-opacity-10"
                                                        style="background-image: url('{{ $optionValue->getFirstMediaUrl('image') }}')"
                                                    >
                                                        <span class="sr-only">{{ $optionValue->label }}</span>
                                                    </li>
                                                @endforeach
                                                @if($option->optionValues->count() > 5)
                                                    <li class="flex-shrink-0 text-xs font-medium leading-5">
                                                        +{{ $option->optionValues->count() - 5 }}
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="pt-1 flex flex-1 flex-col justify-end">
                                        <p class="text-base font-medium text-slate-900">
                                            <x-money
                                                :amount="$product->price"
                                                :currency="config('app.currency')"
                                            />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                </section>
            @endunless
        </div>
    </main>

    <x-slide-over wire:model="showMobileFilterDialog">
        <x-slot:title>
            {{ __('Filters') }}
        </x-slot:title>
        <x-slot:content>
            <div class="space-y-10 divide-y divide-slate-200">
                @foreach($this->productOptionValues->unique('label')->sortBy('option.name')->groupBy('option.name')->all() as $key => $data)
                    <div @class(['pt-10' => !$loop->first])>
                        <fieldset>
                            <legend class="block text-sm font-medium text-slate-900">
                                {{ $key }}
                            </legend>
                            <div class="space-y-3 pt-6">
                                @foreach($data as $value)
                                    @if($value->option->visual == 'color' || $value->option->visual == 'image')
                                        <div
                                            class="inline-flex"
                                            data-tippy-content="{{ $value->label }}"
                                            data-tippy-placement="bottom"
                                        >
                                            <label
                                                for="mobileFilterOptionValue-{{ $value->id }}"
                                                class="block relative w-8 h-8"
                                            >
                                                <input
                                                    wire:model="filters.options"
                                                    type="checkbox"
                                                    id="mobileFilterOptionValue-{{ $value->id }}"
                                                    value="{{ $value->label }}"
                                                    class="sr-only peer"
                                                />
                                                @if($value->option->visual == 'color')
                                                    <span
                                                        class="inline-flex justify-center items-center w-full h-full rounded-full shadow bg-center bg-cover cursor-pointer duration-150"
                                                        style="background-color: {{ $value->value }}"
                                                    ></span>
                                                @else
                                                    <span
                                                        class="inline-flex justify-center items-center w-full h-full rounded-full shadow bg-center bg-cover cursor-pointer duration-150"
                                                        style="background-image: url('{{ $value->getFirstMediaUrl('image') }}')"
                                                    ></span>
                                                @endif
                                                <x-heroicon-m-check class="w-5 h-5 text-white absolute inset-0 m-auto z-0 pointer-events-none hidden peer-checked:block duration-150" />
                                            </label>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            <x-input
                                                wire:model="filters.options"
                                                type="checkbox"
                                                id="mobileFilterOptionValue-{{ $value->id }}"
                                                value="{{ $value->label }}"
                                                class="h-4 w-4 !rounded !shadow-none"
                                            />
                                            <x-input-label
                                                for="mobileFilterOptionValue-{{ $value->id }}"
                                                class="ml-3 !font-normal"
                                            >
                                                {{ $value->label }}
                                            </x-input-label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                @endforeach

                {{--Price--}}
                <div
                    wire:ignore
                    x-data="
                        {
                            min: {{ $this->minPrice }},
                            max: {{ $this->maxPrice }},
                            selectedMin: @entangle('filters.price.min').defer,
                            selectedMax: @entangle('filters.price.max').defer
                        }
                    "
                    x-init="
                        slider = noUiSlider.create($refs.slider, {
                            start: [min, max],
                            step: 1,
                            format: {
                                to: function (value) {
                                    return value.toFixed(0);
                                },
                                from: function (value) {
                                    return value;
                                }
                            },
                            tooltips: [
                                false,
                                false
                            ],
                            connect: true,
                            range: {
                                'min': min,
                                'max': max
                            }
                        });
                        slider.on('slide', function (values, handle) {
                            selectedMin = values[0];
                            selectedMax = values[1];
                        });
                        slider.on('set', function (values, handle) {
                            $wire.set('filters.price.min', values[0]);
                            $wire.set('filters.price.max', values[1]);
                        });
                    "
                    class="pt-10"
                >
                    <fieldset>
                        <legend class="block text-sm font-medium text-gray-900">{{ __('Price') }}</legend>
                        <div class="space-y-3 pt-6">
                            <div
                                x-ref="slider"
                                class="slider-fit"
                            ></div>
                            <p class="text-center text-sm text-slate-700">
                                {{ __('from') }} $<span x-text="selectedMin"></span>
                                {{ __('to') }} $<span x-text="selectedMax"></span>
                            </p>
                        </div>
                    </fieldset>
                </div>
            </div>
        </x-slot:content>
        <x-slot:footer>
            <div class="flex justify-end">
                <button
                    x-on:click="show = false"
                    class="btn btn-lg btn-primary w-full"
                >
                    {{ __('View results') }}
                </button>
            </div>
        </x-slot:footer>
    </x-slide-over>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                Livewire.hook('message.processed', () => {
                    window.scrollTo({top: 0, behavior: 'smooth'});
                    refreshImages();
                });
            });

            function refreshImages() {
                const images = document.querySelectorAll('img[srcset*="responsive-images"]');
                window.requestAnimationFrame(function () {
                    for (let i = 0; i < images.length; i++) {
                        const size = images[i].getBoundingClientRect().width;
                        images[i].sizes = Math.ceil(size / window.innerWidth * 100) + 'vw';
                    }
                });
            }
        </script>
    @endpush

    <section class="my-12">
        <div class="bg-[#F5F5F5] font-poppins">
          <div
            class="relative bg-[#F5F5F5] px-6 pt-10 pb-8 mt-8 ring-gray-900/5 sm:mx-auto sm:rounded-lg sm:px-10"
          >
            <div class="mx-auto px-5">
              <div class="flex flex-col items-center">
                <h2
                  class="font-semibold text-[40px] text-[#151515] text-center leading-none md:leading-tight"
                >
                  Vestibulum mole massa, nec com nulla sed magna
                </h2>
              </div>
              <div
                class="mx-auto mt-8 grid max-w-[900px] divide-y divide-neutral-200"
              >
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libersssssssso?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libero?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libero?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libero?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libero?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
                <div class="py-5">
                  <details class="group">
                    <summary
                      class="flex cursor-pointer list-none items-center justify-between font-medium"
                    >
                      <span class="font-bold text-[20px] text-[#151515]">
                        ¿Mauris at velit interdum, bibendum ligula quis, varius
                        libero?</span
                      >
                      <span class="transition group-open:rotate-180">
                        <svg
                          width="18"
                          height="20"
                          viewBox="0 0 18 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                            stroke="#EB5D2C"
                            stroke-width="3.33333"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </summary>
                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                      Springerdata offers a variety of billing options,
                      including monthly and annual subscription plans, as well
                      as pay-as-you-go pricing for certain services. Payment is
                      typically made through a credit card or other secure
                      online payment method.
                    </p>
                  </details>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>    
  
  
      <section class="font-poppins text-[#151515] w-full testimoniosRelative">
        <h2
          class="w-11/12 mx-auto font-semibold text-[40px] text-center md:text-left"
        >
          Testimonios
        </h2>
  
        <div class="swiper myTestimonios mt-5">
          <div class="swiper-pagination-testimonios"></div>
          <div class="swiper-wrapper mb-12 md:mt-[80px]">
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
  
  
            <div class="swiper-slide">
              <div class="carousel-cell bg-[#F5F5F5] p-10">
                <div class="flex gap-2 py-2">
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                  <img src="{{ asset('img/svg/start.svg') }}" alt="estrella" />
                </div>
                <div class="flex gap-5 items-center">
                  <p class="font-bold text-[20px]">Name N.</p>
                  <img src="{{ asset('img/svg/check.svg') }}" alt="check" />
                </div>
                <p class="font-normal text-[16px]">
                  “Donec ultricies aliquam tortor, eleifend ultricies sapien
                  fringilla condimentum. Aliquam erat volutpat. Morbi ac nibh
                  dolor. Vivamus eget placerat erat, eget consequat nisi.”
                </p>
              </div>
            </div>
          
          </div>
        </div>
      </section>
</div>

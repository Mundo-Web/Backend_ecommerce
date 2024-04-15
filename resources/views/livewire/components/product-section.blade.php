<div>
    @if ($items)
                <div class="hidden md:block">
                    <div class="swiper productos-destacados my-5">
                        <div class="swiper-pagination-productos-destacados mb-80 md:mb-32"></div>
                            <div class="swiper-wrapper mt-[80px]">
                                @foreach ($this->product_items as $product)
                                    <div class="swiper-slide rounded-2xl">
                                        <div class="flex flex-col relative">
                                            <div
                                                class="bg-colorBackgroundProducts rounded-2xl pt-12 pb-5 md:pb-8 product_container basis-4/5 flex flex-col justify-center relative">
                                                <div class="px-4">
                                                    <a
                                                        class="font-semibold text-[8px] md:text-[12px] bg-[#EB5D2C] py-2 px-2 flex-initial w-24 text-center text-white rounded-[5px] absolute top-[18px] z-10">
                                                        Nuevo
                                                    </a>
                                                </div>

                                                <div>

                                                    <div class="relative flex justify-center items-center p-5">
                                                        @if ($product->hasMedia('gallery'))
                                                            {{ $product->getFirstMedia('gallery')('responsive')->attributes(['alt' => $product->name, 'class' => 'h-64 w-full object-cover object-center']) }}
                                                        @else
                                                            <img src="{{ $product->getFirstMediaUrl('gallery') }}"
                                                                alt="{{ $product->name }}"
                                                                class="h-64 w-full object-cover object-center ">
                                                        @endif
                                                    </div>

                                                    <!-- ------ -->
                                                    <div class="addProduct text-center flex justify-center">
                                                        <a href="#addProducto"
                                                            class="font-semibold text-[9px] md:text-[16px] bg-[#74A68D] py-3 px-5 flex-initial w-32 md:w-56 text-center text-white rounded-3xl">
                                                            Agregar al carrito
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-2 flex flex-col items-start gap-2 basis-1/5 px-2">
                                                
                                                <h2 class="font-semibold text-[16px] text-[#141718]">
                                                    <p class="sr-only">
                                                        {{ trans_choice(':count out of 5 stars', ['count' => $product->reviews->count()]) }}
                                                    </p>
                                                    <div class="flex flex-row">
                                                        <x-star-rating :rating="$product->reviews->avg('rating')" />
                                                        <p class="mt-1 text-sm text-slate-500 ml-2">
                                                        (  {{ trans_choice(':count |:count ', $product->reviews->count()) }} )
                                                        </p>
                                                    </div>
                                                </h2>
                                                
                                                
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('guest.products.detail', $product) }}">
                                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                            
                                                <p class="font-semibold text-[14px] text-[#121212] flex gap-5">
                                                    <x-money :amount="$product->price" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                         </div>  
                     </div>
                </div>
    @elseif($handle)

    @endif
</div>
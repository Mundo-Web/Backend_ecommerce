<div>
    @if($items)
        <div class="mt-5 flow-root">
            <div class="-my-2">
                <div class="relative box-content h-64 overflow-x-auto py-2 xl:overflow-visible">
                    <div class="min-w-screen-xl absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-8 xl:space-x-0 xl:px-0">
                        @foreach($this->collection_items->take(5) as $item)
                            <a
                                href="{{ route('guest.collections.detail', $item) }}"
                                class="group relative flex h-64 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto"
                            >
                                <span
                                    aria-hidden="true"
                                    class="absolute inset-0"
                                >
                                    <img
                                        src="{{ $item->getFirstMediaUrl('cover') }}"
                                        alt="{{ $item->title }}"
                                        class="h-full w-full object-cover object-center group-hover:scale-125"
                                    >
                                </span>
                                <span
                                    aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-slate-800 opacity-50"
                                ></span>
                                <span class="relative mt-auto text-center text-xl font-bold text-white">
                                    {{ $item->title }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @elseif($handle)
    @if(count($this->collection_carousel->slides->take(4)) == 1)
    <section class="mt-10 hidden md:block relative">
        
        <div class="grid grid-cols-1 gap-4 w-10/12 mx-auto">
        
        @foreach($this->collection_carousel->slides->take(1) as $index  => $slide)
            <!-- Columna 1 -->
            {{-- @if($index == 0) --}}
                <div class="col-span-2 row-span-2">
                    <div class="bg-[#F3F5F7] flex flex-row h-full rounded-xl">
                    <div class="flex justify-start items-center basis-1/2">
                        <img
                        src="{{ $slide->getFirstMediaUrl('image') }}"
                        alt="{{ $slide->title }}"
                        class="w-full"
                        />
                    </div>

                    <div class="font-poppins basis-1/2 p-4 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px]">
                            {{ $slide->title }}
                        </h2>
                        <p class="my-2 font-normal text-[16px]">
                            {{ $slide->description }}
                        </p>

                        <div>
                        <a
                            href="{{ $slide->button_link }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-1 px-5 rounded-3xl border-[1px] border-colorBorder"
                            >Comprar
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            {{-- @endif --}}
             <!--Fin Columna 1 -->
        @endforeach


        </div>
       
    </section>


    @elseif(count($this->collection_carousel->slides->take(4)) == 2)

    <section class="mt-10 hidden md:block relative">
        
        <div class="grid grid-cols-4 gap-4 w-full mx-auto">
        
        @foreach($this->collection_carousel->slides->take(2) as $index  => $slide)
             <!-- Columna 1 y 2-->
           
                <div class="col-span-2 row-span-1">
                    <div class="bg-[#F3F5F7] flex flex-row h-full rounded-xl">
                    <div class="flex justify-start items-center basis-1/2">
                        <img
                        src="{{ $slide->getFirstMediaUrl('image') }}"
                        alt="{{ $slide->title }}"
                        class="w-full"
                        />
                    </div>

                    <div class="font-poppins basis-1/2 p-4 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px]">
                            {{ $slide->title }}
                        </h2>
                        <p class="my-2 font-normal text-[16px]">
                            {{ $slide->description }}
                        </p>

                        <div>
                        <a
                            href="{{ $slide->button_link }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-1 px-5 rounded-3xl border-[1px] border-colorBorder"
                            >Comprar
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            
          <!--Fin Columna 1 -->
        @endforeach
        </div>
    </section>
   
    @elseif(count($this->collection_carousel->slides->take(4)) == 3)

    <section class="mt-10 hidden md:block relative">
        
        <div class="grid grid-cols-4 gap-4 w-full mx-auto">
        
        @foreach($this->collection_carousel->slides->take(3) as $index  => $slide)
             <!-- Columna 1 2 y 3-->
           
                <div class="col-span-2 @if($loop->first) row-span-2 @elseif(!$loop->first)  row-span-1  @endif">
                    <div class="bg-[#F3F5F7] flex  @if($loop->first) flex-col @elseif(!$loop->first) flex-row @endif  h-full rounded-xl">
                    <div class="flex justify-start items-center basis-1/2">
                        <img
                        src="{{ $slide->getFirstMediaUrl('image') }}"
                        alt="{{ $slide->title }}"
                        class="w-full"
                        />
                    </div>

                    <div class="font-poppins basis-1/2 p-4 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px]">
                            {{ $slide->title }}
                        </h2>
                        <p class="my-2 font-normal text-[16px]">
                            {{ $slide->description }}
                        </p>

                        <div>
                        <a
                            href="{{ $slide->button_link }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-1 px-5 rounded-3xl border-[1px] border-colorBorder"
                            >Comprar
                        </a>
                        </div>
                    </div>
                    </div>
                </div>


            
          <!--Fin Columna 1 -->
        @endforeach
        </div>
    </section>

    @elseif(count($this->collection_carousel->slides->take(4)) == 4)

    <section class="mt-10 hidden md:block relative">
        
        <div class="grid grid-cols-4 gap-4 w-full mx-auto">
        
        @foreach($this->collection_carousel->slides->take(4) as $index  => $slide)
             <!-- Columna 1 2 3 y 4-->
           
                <div class="@if($loop->index == 0 || $loop->index == 1) col-span-2  @elseif($loop->index == 2 || $loop->index == 3) col-span-1 @endif  @if($loop->first) row-span-2 @elseif(!$loop->first)  row-span-1  @endif">
                    <div class="bg-[#F3F5F7] flex  @if($loop->index == 0 || $loop->index == 2 || $loop->index == 3) flex-col @elseif($loop->index == 1) flex-row  @endif  h-full rounded-xl">
                    <div class="flex justify-start items-center basis-1/2">
                        <img
                        src="{{ $slide->getFirstMediaUrl('image') }}"
                        alt="{{ $slide->title }}"
                        class="w-full"
                        />
                    </div>

                    <div class="font-poppins basis-1/2 p-4 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px]">
                            {{ $slide->title }}
                        </h2>
                        <p class="my-2 font-normal text-[16px]">
                            {{ $slide->description }}
                        </p>

                        <div>
                        <a
                            href="{{ $slide->button_link }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-1 px-5 rounded-3xl border-[1px] border-colorBorder"
                            >Comprar
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
 
          <!--Fin Columna 1 -->
        @endforeach
        </div>
    </section>
    @endif
    @endif
</div>
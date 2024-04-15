<main>
    @if($this->hero_carousel)
        <div
            x-data="{ current: 0 }"
            class="relative overflow-auto"
        >
            <ul
                x-ref="slider"
                class="flex flex-1 scroll-smooth scroll-no-bar snap-mandatory snap-x overflow-x-auto overflow-y-hidden"
            >
            <div class="absolute bottom-10 inset-x-0 flex justify-center space-x-3">
                @foreach($this->hero_carousel->slides as $slide)
                    <button x-on:click="$refs.slider.scrollTo({ left: $refs.slider.offsetWidth * {{ $loop->index }}, behavior: 'smooth' })">
                        <span class="sr-only">
                            {{ __('Slide :count', ['count' => $loop->index + 1]) }}
                        </span>
                        <span
                            class="block h-2 w-2 rounded-full ring-2 ring-white ring-opacity-50 hover:ring-opacity-100"
                            :class="{ 'bg-white ring-opacity-100': current === {{ $loop->index }} }"
                        ></span>
                    </button>
                @endforeach
            </div>
                @foreach($this->hero_carousel->slides as $slide)
                    <li
                        x-intersect.threshold.90="$nextTick(() => current = {{ $loop->index }})"
                        class="snap-center shrink-0 w-full"
                    >
                        <div class="relative bg-slate-900">
                            <div
                                aria-hidden="true"
                                class="absolute inset-0"
                            >
                                @if($slide->hasMedia('image'))
                                    {{ $slide->getFirstMedia('image')('responsive')->attributes(['class' => 'h-[110%] 2xl:h-full w-full object-cover object-center size-full']) }}
                                @else
                                    <img
                                        src="{{ asset('img/placeholder-wide.png') }}"
                                        alt="{{ $slide->title }}"
                                        class="h-full w-full object-cover object-center"
                                    >
                                @endif
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 relative px-6 py-32 bg-slate-900 bg-opacity-0 sm:px-12 sm:pt-32 sm:pb-56 lg:px-16 ">
                                <div class="relative mx-auto flex max-w-3xl flex-col items-start text-left text-white font-poppins">
                                    <h1 class="font-semibold text-[40px] xl:text-[55px] leading-tight md:leading-tight pt-8 ">
                                        {{ $slide->title }}
                                    </h1>
                                    @if($slide->description)
                                        <p class="mt-5 text-xl text-white line-clamp-3 font-normal leading-normal">
                                            {{ $slide->description }}
                                        </p>
                                    @endif
                                    <div class="flex flex-row gap-10 text-left mt-5">
                                        @if($slide->button_link && $slide->button_text)
                                            <a
                                                href="{{ $slide->button_link }}"
                                                class="mt-8 block w-full rounded-3xl border border-transparent bg-[#74A68D] duration-500 hover:bg-[#4e8569] px-8 py-3 text-base font-medium text-white  sm:w-auto"
                                            >
                                                {{ $slide->button_text }}
                                            </a>

                                            <a
                                                href="{{ $slide->button_link_two }}"
                                                class="mt-8 block w-full rounded-3xl border-2 border-white bg-transparent px-8 py-3 text-base font-medium text-white hover:bg-colorBackgroundHeader sm:w-auto duration-500"
                                            >
                                                {{ $slide->button_text_two }}
                                            </a>
                                        @endif
                                    </div>      
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
           
        </div>

        <!-- Section Beneficios -->
        <section>
            <div>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <div
                  class="group bg-colorBackgroundMainTop hover:bg-white p-14 md:duration-1000"
                >
                  <div
                    class="pb-5 flex justify-center items-center md:justify-start"
                  >
                    <svg
                      width="44"
                      height="40"
                      viewBox="0 0 44 40"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M26 34V10M26 34H30M26 34H16M26 10C26 5.58172 22.4183 2 18 2H10C5.58172 2 2 5.58172 2 10V26C2 29.7304 4.55333 32.8645 8.00769 33.7499M26 10H32.4182C33.4344 10 34.4126 10.3868 35.154 11.0819L40.7358 16.3148C41.5424 17.071 42 18.1273 42 19.2329V30C42 32.2091 40.2091 34 38 34M38 34C38 36.2091 36.2091 38 34 38C31.7909 38 30 36.2091 30 34M38 34C38 31.7909 36.2091 30 34 30C31.7909 30 30 31.7909 30 34M16 34C16 36.2091 14.2091 38 12 38C9.79086 38 8 36.2091 8 34C8 33.916 8.00259 33.8326 8.00769 33.7499M16 34C16 31.7909 14.2091 30 12 30C9.87484 30 8.13677 31.6573 8.00769 33.7499"
                        stroke="white"
                        stroke-width="2.5"
                        class="group-hover:stroke-[#151515]"
                      />
                    </svg>
                  </div>
                  <div class="font-poppins text-center md:text-left">
                    <h3
                      class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]"
                    >
                      Envío gratis
                    </h3>
                    <p
                      class="text-white group-hover:text-colorTextBlack font-normal text-[16px]"
                    >
                      compras superior a s/200
                    </p>
                  </div>
                </div>
                <div
                  class="group bg-colorBackgroundMainTop hover:bg-white p-10 md:duration-1000"
                >
                  <div
                    class="pb-5 flex justify-center items-center md:justify-start"
                  >
                    <svg
                      width="49"
                      height="48"
                      viewBox="0 0 49 48"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        x="4.33398"
                        y="8"
                        width="40"
                        height="32"
                        rx="4"
                        stroke="white"
                        stroke-width="2.5"
                        class="group-hover:stroke-[#151515]"
                      />
                      <circle
                        cx="4"
                        cy="4"
                        r="4"
                        transform="matrix(1 0 0 -1 20.334 28)"
                        stroke="white"
                        stroke-width="2.5"
                        class="group-hover:stroke-[#151515]"
                      />
                      <circle
                        cx="2"
                        cy="2"
                        r="2"
                        transform="matrix(1 0 0 -1 34.334 26)"
                        fill="white"
                        class="group-hover:stroke-[#151515]"
                      />
                      <circle
                        cx="2"
                        cy="2"
                        r="2"
                        transform="matrix(1 0 0 -1 10.334 26)"
                        fill="white"
                        class="group-hover:stroke-[#151515]"
                      />
                    </svg>
                  </div>
                  <div class="font-poppins text-center md:text-left">
                    <h3
                      class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]"
                    >
                      Devolución de dinero
                    </h3>
                    <p
                      class="text-white group-hover:text-colorTextBlack font-normal text-[16px]"
                    >
                      Garantía de 30 días
                    </p>
                  </div>
                </div>
    
                <div
                  class="group bg-colorBackgroundMainTop hover:bg-white p-10 md:duration-1000"
                >
                  <div
                    class="pb-5 flex justify-center items-center md:justify-start"
                  >
                    <svg
                      width="49"
                      height="48"
                      viewBox="0 0 49 48"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M32.666 16H16.666M32.666 16C37.0843 16 40.666 19.5817 40.666 24V36C40.666 40.4183 37.0843 44 32.666 44H16.666C12.2477 44 8.66602 40.4183 8.66602 36V24C8.66602 19.5817 12.2477 16 16.666 16M32.666 16V12C32.666 7.58172 29.0843 4 24.666 4C20.2477 4 16.666 7.58172 16.666 12V16M24.666 32V28"
                        stroke="white"
                        stroke-width="2.5"
                        stroke-linecap="round"
                        class="group-hover:stroke-[#151515]"
                      />
                    </svg>
                  </div>
                  <div class="font-poppins text-center md:text-left">
                    <h3
                      class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]"
                    >
                      Pagos seguros
                    </h3>
                    <p
                      class="text-white group-hover:text-colorTextBlack font-normal text-[16px]"
                    >
                      Asegurado por...
                    </p>
                  </div>
                </div>
    
                <div
                  class="group bg-colorBackgroundMainTop hover:bg-white p-10 md:duration-1000"
                >
                  <div
                    class="pb-5 flex justify-center items-center md:justify-start"
                  >
                    <svg
                      width="48"
                      height="48"
                      viewBox="0 0 48 48"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M42 38V34.7081C42 33.0725 41.0042 31.6017 39.4856 30.9942L35.4173 29.3669C33.4857 28.5943 31.2844 29.4312 30.354 31.292L30 32C30 32 25 31 21 27C17 23 16 18 16 18L16.708 17.646C18.5688 16.7156 19.4057 14.5143 18.6331 12.5827L17.0058 8.51444C16.3983 6.99581 14.9275 6 13.2919 6H10C7.79086 6 6 7.79086 6 10C6 27.6731 20.3269 42 38 42C40.2091 42 42 40.2091 42 38Z"
                        stroke="white"
                        stroke-width="2.5"
                        stroke-linejoin="round"
                        class="group-hover:stroke-[#151515]"
                      />
                    </svg>
                  </div>
                  <div class="font-poppins text-center md:text-left">
                    <h3
                      class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]"
                    >
                      Soporte 24/7
                    </h3>
                    <p
                      class="text-white group-hover:text-colorTextBlack font-normal text-[16px]"
                    >
                      Soporte telefónico y por correo electrónico
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </section>

    @else
        <div class="relative bg-slate-900">
            <div
                aria-hidden="true"
                class="absolute inset-0"
            >
                <img
                    src="{{ asset('img/placeholder-wide.png') }}"
                    alt="{{ __('Hero carousel placeholder') }}"
                    class="h-full w-full object-cover object-center"
                >
            </div>
            <div class="relative px-6 py-32 bg-slate-900 bg-opacity-50 sm:px-12 sm:py-40 lg:px-16">
                <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        {{ __('Hero carousel title') }}
                    </h2>
                    <p class="mt-3 text-xl text-white line-clamp-2">
                        {{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}
                    </p>
                    <a
                        href="javascript:void(0);"
                        class="mt-8 block w-full rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-slate-900 cursor-not-allowed hover:bg-slate-100 sm:w-auto"
                    >
                        {{ __('Shop now') }}
                    </a>
                </div>
            </div>
        </div>
    @endif

    {{-- @if($this->perk_carousel)
        <div class="bg-slate-50">
            <h2 class="sr-only">{{ __('Our perks') }}</h2>
            <div class="mx-auto max-w-7xl divide-y divide-slate-200 lg:flex lg:divide-x lg:divide-y-0 lg:py-8 overflow-x-scroll">
                @foreach($this->perk_carousel->slides as $slide)
                    <div class="py-8 lg:w-1/3 lg:flex-none lg:py-0">
                        <div class="mx-auto flex max-w-xs items-center px-4 lg:max-w-none lg:px-8">
                            @if($slide->hasMedia('image'))
                                <img
                                    src="{{ $slide->getFirstMediaUrl('image') }}"
                                    alt="{{ $slide->title }}"
                                    class="mr-4 h-12 w-12 flex-shrink-0"
                                >
                            @endif
                            <div class="flex flex-auto flex-col-reverse">
                                <h3 class="font-medium text-slate-900">{{ $slide->title }}</h3>
                                <p class="text-sm text-slate-500">{{ $slide->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif --}}

    @foreach(collect($this->template_settings->home_page_sections)->sortBy('order') as $section)
        <section @class(['bg-white px-4 pt-24 space-y-5 sm:px-6 sm:pt-32 xl:mx-auto xl:max-w-full md:px-[8%]', 'pb-24 sm:pb-32' => $loop->last])>
            <div class="block lg:flex sm:items-center sm:justify-between">
               <div>
                  <h2 class="text-4xl font-bold tracking-tight text-slate-900">
                      {{ $section['title'] }}
                  </h2>
                  @if($section['description'])
                      <p
                          class="hidden text-lg font-semibold text-slate-900 sm:block w-[85%] mt-3 "
                      >
                       {{ $section['description'] }}
                      
                      </p>
                   @endif
                </div> 
                <div>
                  @if($section['link'] && $section['link_text'])
                      <a
                          href="{{ $section['link'] }}"
                          class="hidden mt-5 lg:mt-0 font-semibold text-[16px] bg-transparent md:duration-500 py-4 px-5 rounded-3xl border-[1px] border-colorBorder flex-initial  text-center sm:block w-56"
                      >
                          {!! $section['link_text'] !!}
                          <span aria-hidden="true"> &rarr;</span>
                      </a>
                  @endif
                </div> 
            </div>
            @if($section['banner_path'])
                <img
                    src="{{ Storage::url($section['banner_path']) }}"
                    alt="{{ $section['title'] }}"
                    class="w-full h-auto object-cover object-center rounded-lg"
                />
            @endif
            @if($section['type'] === 'collection')
                <livewire:components.collection-section
                    :handle="$section['carousel_handle']"
                    :items="$section['items']"
                />
            @elseif($section['type'] === 'product')
                <livewire:components.product-section
                    :handle="$section['carousel_handle']"
                    :items="$section['items']"
                />
            @elseif($section['type'] === 'blog')
                <livewire:components.blog-section />
            @endif
        </section>
    @endforeach



    <section>
      <div
        class="flex flex-col gap-5 lg:grid lg:grid-cols-2 lg:grid-rows-[700px] h-[100%]"
      >
        <div class="basis-1/2 flex items-center justify-center">
          <img
            src="{{ asset('img/images/vestibulo.png') }}"
            alt="vestibulo"
            class="w-full h-full object-cover object-center"
          />
        </div>
        <div class="basis-1/2 beneficioRelative px-5 md:px-10">
          <!-- aca va beneficion -->
          <div class="swiper myBeneficios h-full">
            <div class="swiper-wrapper">
             
              <div class="swiper-slide">
                <div class="flex flex-col gap-5 my-12">
                  <p class="font-semibold text-[24px]">Beneficios 01</p>

                  <h2
                    class="font-semibold text-[48px] leading-none md:leading-tight"
                  >
                    Vestibulum mole massa nec hendrerit, nec com nulla sed
                    magna
                  </h2>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus.
                  </p>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus varius faucibus. Mauris velit
                    urna, rhoncus consequat euismod.
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="flex flex-col gap-5 mt-10">
                  <p class="font-semibold text-[24px]">Beneficios 02</p>

                  <h2
                    class="font-semibold text-[48px] leading-none md:leading-tight"
                  >
                    Vestibulum mole massa nec hendrerit, nec com nulla sed
                    magna
                  </h2>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus.
                  </p>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus varius faucibus. Mauris velit
                    urna, rhoncus consequat euismod.
                  </p>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="flex flex-col gap-5 mt-10">
                  <p class="font-semibold text-[24px]">Beneficios 03</p>

                  <h2
                    class="font-semibold text-[48px] leading-none md:leading-tight"
                  >
                    Vestibulum mole massa nec hendrerit, nec com nulla sed
                    magna
                  </h2>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus.
                  </p>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus varius faucibus. Mauris velit
                    urna, rhoncus consequat euismod.
                  </p>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="flex flex-col gap-5 mt-10">
                  <p class="font-semibold text-[24px]">Beneficios 04</p>

                  <h2
                    class="font-semibold text-[48px] leading-none md:leading-tight"
                  >
                    Vestibulum mole massa nec hendrerit, nec com nulla sed
                    magna
                  </h2>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus.
                  </p>

                  <p class="font-normal text-[18px]">
                    Cras et sapien nisl. Sed magna erat, rutrum eu est ac,
                    aliquet ornare quam. Nunc pharetra, tellus eu venenatis
                    vestibulum, ante nibh rutrum erat, ac malesuada neque
                    tellus ut diam. Praesent ac aliquet metus, id porta nisi.
                    Praesent et libero a tellus varius faucibus. Mauris velit
                    urna, rhoncus consequat euismod.
                  </p>
                </div>
              </div>
          
            </div>
            <div class="swiper-pagination-beneficios"></div>
          </div>
        </div>
      </div>
    </section>

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

</main>

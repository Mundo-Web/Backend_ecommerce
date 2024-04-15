<footer class="font-poppins bg-[#21201E] text-white mt-12 pb-10">
    <div
      class="flex flex-col gap-10 md:flex-row md:justify-center w-11/12 mx-auto py-16 border-b-2 border-[#6C7275]"
    >
      <div class="basis-3/6 flex flex-col gap-10">
        <div>
          <a href="/">
            <img src="{{ asset('img/images/logo_footer_decotab.png') }}" alt="decotab"
          /></a>
        </div>
        <p class="font-medium text-[20px]">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita
          sed repellat, voluptatibus fugit quis cupiditate magnam, totam esse
          vero.
        </p>

        <div class="flex gap-6">
            @foreach($brandSettings->social_links as $socialLink)
                @if($socialLink['url'])
                    <a
                        href="{{ $socialLink['url'] }}"
                        class="text-white hover:text-white"
                    >
                        <span class="sr-only">{{ $socialLink['name'] }}</span>
                        <x-icon
                            name="simpleicon-{{ Str::lower($socialLink['name']) }}"
                            class="h-6 w-6"
                        />
                    </a>
                @endif
             @endforeach
        </div>
      </div>

      <div class="basis-1/6 flex flex-col gap-5">
       
      </div>

      <div class="basis-1/6 flex flex-col gap-5">
        <h3 class="font-medium text-[16px]">Páginas</h3>

        @if($this->footerMenu)
                @foreach($this->footerMenu->menuItems as $menuItem)
                    <div @class(['' => !$loop->first])>
                        <a  href="{{ $menuItem->url }}">
                            <h3 class="text-sm font-semibold leading-6 text-white">
                                {{ $menuItem->name }}
                            </h3>
                        </a>    
                        @if($menuItem->children->count())
                            <ul
                                role="list"
                                class="mt-6 space-y-4"
                            >
                                @foreach($menuItem->children as $child)
                                    <li>
                                        <a
                                            href="{{ $child->url }}"
                                            class="text-sm leading-6 text-slate-300 hover:text-white"
                                        >
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
         @endif
      </div>

      <div class="basis-1/6 flex flex-col gap-5">
        <h3 class="font-medium text-[16px]">Office</h3>

        <p class="font-normal text-[14px]">4311 Av. Javier Prado</p>
        <p class="font-normal text-[14px]">San Isidro, Lima</p>
        <p class="font-normal text-[14px]">Perú</p>
        <p class="font-normal text-[14px]">+51 999 999 999</p>
      </div>
    </div>

    <div
      class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center gap-5 w-11/12 mx-auto"
    >
      <div class="flex flex-col md:flex-row gap-2">
        <p class="font-normal text-[12px]">
          Copyright &copy; 2023 Mundo Web. Reservados todos los derechos
        </p>
        <p class="hidden md:block">|</p>

        <div class="flex gap-5">
          <a href="#" class="font-normal text-[12px] text-[#6C7275]"
            >Política de privacidad</a
          >
          <a href="#" class="font-normal text-[12px] text-[#6C7275]"
            >Términos y Condiciones</a
          >
        </div>
      </div>

      <div class="flex flex-wrap gap-2 pb-5">
        <img src="{{ asset('img/svg/visa.svg') }}" alt="visa" />
        <img src="{{ asset('img/svg/american.svg') }}" alt="american" />
        <img src="{{ asset('img/svg/mastercad.svg') }}" alt="mastercad" />
        <img src="{{ asset('img/svg/stripe.svg') }}" alt="stripe" />
        <img src="{{ asset('img/svg/paypal.svg') }}" alt="paypal" />
        <img src="{{ asset('img/svg/pay.svg') }}" alt="pay" />
      </div>
    </div>
  </footer>
<x-guest-layout>
    <style>
        header,footer{
            display: none;
        }
    </style>    
    
<div class="flex flex-row md:h-screen justify-center py-12 md:py-0">
    <div class="bg-blue-500 basis-1/2 hidden lg:block font-poppins">
      <!-- Imagen ocupando toda la altura y sin desbordar -->
      <div
        class="register bg-cover bg-center bg-no-repeat w-full h-full"
      >
      <div
      class="font-medium text-[24px] py-10 bg-black bg-opacity-25 text-center text-white flex flex-row justify-center items-center"
      >
      <a href="/">
       <img src="{{ asset('img/images/logo_footer_decotab.png') }}" class="w-28"/>
      </a></div>
      </div>
    </div>

    <!-- Segundo div -->
    <div
      class="w-full lg:basis-1/2 text-[#151515] flex justify-center items-center font-poppins px-5 md:px-0"
    >
      <div class="w-full md:w-4/6 flex flex-col gap-5">
        <div class="px-4 flex flex-col gap-5 text-center md:text-left">
          <h1 class="font-semibold text-[40px]">{{ __('Account registration') }}</h1>
          <p class="font-normal text-[16px]">
            {{ __('Already have one?') }}
            <a href="{{ route('login') }}" class="font-bold text-[16px] text-[#EB5D2C]"
              >{{ __('Sign in') }}</a
            >
          </p>
        </div>
        <div class="">
            <x-cardlogin>
                <x-slot:content class="!py-8">
                    <form
                        method="POST"
                        action="{{ route('register') }}"
                    >
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label
                                for="name"
                                :value="__('Your name')"
                            />

                            <x-inputlogin
                                id="name"
                                class="block mt-1 w-full sm:text-sm"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                            />

                            <x-input-error
                                for="name"
                                class="mt-2"
                            />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-6">
                            <x-input-label
                                for="email"
                                :value="__('Email address')"
                            />

                            <x-inputlogin
                                id="email"
                                class="block mt-1 w-full sm:text-sm"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                            />

                            <x-input-error
                                for="email"
                                class="mt-2"
                            />
                        </div>

                        <!-- Password -->
                        <div class="mt-6">
                            <x-input-label
                                for="password"
                                :value="__('Password')"
                            />

                            <x-inputlogin
                                id="password"
                                class="block mt-1 w-full sm:text-sm"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                            />

                            <x-input-error
                                for="password"
                                class="mt-2"
                            />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-6">
                            <x-input-label
                                for="password_confirmation"
                                :value="__('Confirm Password')"
                            />

                            <x-inputlogin
                                id="password_confirmation"
                                class="block mt-1 w-full sm:text-sm"
                                type="password"
                                name="password_confirmation"
                                required
                            />

                            <x-input-error
                                for="password_confirmation"
                                class="mt-2"
                            />
                        </div>

                        <div class="mt-6">
                            <button
                                type="submit"
                                class=" w-full text-white bg-[#151515] py-4 rounded-3xl "
                            >
                                {{ __('Sign up') }}
                            </button>
                        </div>
                    </form>
                </x-slot:content>
            </x-cardlogin>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>


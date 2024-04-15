<x-guest-layout>
    <style>
        header,
        footer {
            display: none;
        }
    </style>
    <div class="flex h-screen">
        <!-- Primer div -->
        <div class="bg-blue-500 basis-1/2 hidden lg:block font-poppins">
            <!-- Imagen ocupando toda la altura y sin desbordar -->
            <div class="login bg-cover bg-center bg-no-repeat w-full h-full ">
                <div
                    class="font-medium text-[24px] py-10 bg-black bg-opacity-25 text-center text-white flex flex-row justify-center items-center">
                    <a href="/">
                        <img src="{{ asset('img/images/logo_footer_decotab.png') }}" class="w-28" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Segundo div -->
        <div class="w-full lg:basis-1/2 text-[#151515] flex justify-center items-center font-poppins">
            <div class="w-full md:w-4/6 flex flex-col gap-5">
                <div class="px-4 flex flex-col gap-5 text-center md:text-left">
                    <h1 class="font-semibold text-[40px]">{{ __('Sign in') }}</h1>
                    <p class="font-normal text-[16px]">
                        ¿Aún no tienes una cuenta?
                        <a href="{{ route('register') }}"
                            class="font-bold text-[16px] text-[#EB5D2C] ">{{ __('create a new one to get started') }}</a>
                    </p>
                </div>
                <div class="">
                    <x-cardlogin>
                        <x-slot:content class="!py-8">
                            <!-- Session Status -->
                            @if (session('status'))
                                <x-alert class="mb-6" type="success" message="{{ session('status') }}" />
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email address')" />

                                    <x-inputlogin id="email" class="block mt-1 w-full sm:text-sm" type="email"
                                        name="email" :value="old('email')" required autofocus />

                                    <x-input-error for="email" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-6">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-inputlogin id="password" class="block mt-1 w-full sm:text-sm" type="password"
                                        name="password" required autocomplete="current-password" />

                                    <x-input-error for="password" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="mt-6 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <x-input type="checkbox" name="remember_me" id="remember_me"
                                            class="h-4 w-4 !rounded !shadow-none" />

                                        <x-input-label for="remember_me" :value="__('Remember me')" class="ml-2" />
                                    </div>
                                    <div class="text-sm ">
                                        <a href="{{ route('password.request') }}" class="btn btn-link  text-[#EB5D2C]">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <button class=" text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer">
                                        {{ __('Sign in') }}
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

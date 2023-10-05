<x-layout>
    <div class="mx-4">
        <x-card
            class="max-w-lg mx-auto mt-24" style="margin-left:auto; margin-right:auto; box-shadow: 0px 0px 3px gray; box-shadow: 0px 0px 5px #8e0393;
            background: #8e039308; word-break:break-word;"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    {{ __('labels.l_register') }}
                </h2>
                <p class="mb-4">{{ __('labels.l_register_subheader') }}</p>
            </header>

            <form method="post" action="{{ route('create_new_user_url') }}">
                @csrf

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        {{ __('labels.l_name') }}
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ old('name') }}"
                    />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >{{ __('labels.l_email') }}</label
                    >
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{ old('email') }}"
                    />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2"
                    >
                        {{ __('labels.l_password') }}
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                        value="{{ old('password') }}"
                    />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="password2"
                        class="inline-block text-lg mb-2"
                    >
                        {{ __('labels.l_confirm_pass') }}
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                    />

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 text-center">
                    <button
                        type="submit"
                        class="text-white py-2 px-4 btn-gradient"
                    >
                        {{ __('labels.l_sign_up') }}
                    </button>
                </div>

                <div class="mt-8 text-center">
                    <p>
                        {{ __('labels.l_already_have_account') }}
                        <a href="{{ route('login_form_url') }}" class="text-laravel"
                            >{{ __('labels.l_login') }}</a
                        >
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
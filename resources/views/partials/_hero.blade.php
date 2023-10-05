<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4 main-gradient"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                
            ></div>

            <div class="z-10">
               
                <hr style="width:20%; margin-left:auto; margin-right:auto; margin-top:10px;">

                <h1 class="text-6xl font-bold uppercase text-white">
                    {{ __('labels.l_find') }}<span style="text-transform:none;">{{ __('labels.l_a') }}</span><span class="text-black" style="color: #431571; ">{{ __('labels.l_job') }}</span>
                </h1>
                <hr style="width:20%; margin-left:auto; margin-right:auto; margin-top:10px;">
                <p class="text-2xl text-gray-200 font-bold my-4">
                    {{ __('labels.l_hero_subhead') }}
                </p>
                <div>
                    @auth
                        <a
                            href="{{ route('listings_create_form_url') }}"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 btn-dark-purple"
                            >{{ __('labels.l_post_job') }}</a
                        >
                    @else
                        <a
                            href="{{ route('register_form_url') }}"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 btn-dark-purple"
                            >{{ __('labels.l_hero_btn') }}</a
                        >
                    @endauth
                </div>
            </div>
        </section>
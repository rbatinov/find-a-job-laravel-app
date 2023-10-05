
<x-layout>
    

    <div class="mx-auto">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24" style="margin-left:auto; margin-right:auto;">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    {{ __('labels.l_listing_create_header') }}
                </h2>
                <p class="mb-4">{{ __('labels.l_listing_create_subheader') }}</p>
            </header>

            <form method="POST" action="{{ route('store_listing_url') }}" enctype="multipart/form-data">
                @csrf

                <div class="mt-6">
                    <label for="company" class="inline-block text-lg mb-2">{{ __('labels.l_listing_company') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="{{ __('labels.l_listing_company_placeholder') }}" value="{{ old('company') }}"/>
                </div>

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="title" class="inline-block text-lg mb-2">{{ __('labels.l_listing_job_title') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        placeholder="{{ __('labels.l_listing_job_title_placeholder') }}" value="{{ old('title') }}"/>
                </div>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="location" class="inline-block text-lg mb-2">{{ __('labels.l_listing_job_location') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                        placeholder="{{ __('labels.l_listing_job_location_placeholder') }}" value="{{ old('location') }}"/>
                </div>

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="email" class="inline-block text-lg mb-2">{{ __('labels.l_listing_contact_email') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}"/>
                </div>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="website" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_website') }}
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" placeholder="{{ __('labels.l_listing_website_placeholder') }}" value="{{ old('website') }}"/>
                </div>

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_tags') }}
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" id="tags" name="tags"
                        placeholder="{{ __('labels.l_listing_tags_placeholder') }}" value="{{ old('tags') }}"/>
                </div>

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_picture') }}
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                </div>

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_job_description') }}
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                        placeholder="Include tasks, requirements, salary, etc">
                        {{ old('description') }}
                    </textarea>
                </div>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-6 text-center">
                    <button class="text-white btn-gradient">
                        {{ __('labels.l_listing_create_btn') }}
                    </button>

                    <a href="{{ route('home_url') }}" class="text-black ml-4"> {{ __('labels.l_back') }} </a>
                </div>
            </form>
        </x-card>
    </div>


</x-layout>

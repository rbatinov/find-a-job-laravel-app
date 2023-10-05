<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24" style="margin-left:auto; margin-right:auto; box-shadow: 0px 0px 3px gray; box-shadow: 0px 0px 5px #8e0393;
        background: #8e039308; word-break:break-word;"

        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    {{ __('labels.l_edit_listing_header') }}
                </h2>
                <p class="mb-4">{{ __('labels.l_edit_listing_subheader') }} <span style="color: #B24592;">{{ $listing->title }}</span></p>
            </header>

            <form method="POST" action="{{ route('update_listing_url', ['listing' => $listing->id ]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="company_id" value="{{ $listing->company->id }}">
                <div class="mb-6">
                    <label for="company" class="inline-block text-lg mb-2">{{ __('labels.l_listing_company') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                        placeholder="{{ __('labels.l_listing_company_placeholder') }}" value="{{ is_null($listing->company) ? "" : $listing->company->name }}" />
                </div>

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">{{ __('labels.l_listing_job_title') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        placeholder="{{ __('labels.l_listing_job_title_placeholder') }}" value="{{ $listing->title }}" />
                </div>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">{{ __('labels.l_listing_job_location') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                        placeholder="{{ __('labels.l_listing_job_location_placeholder') }}" value="{{ $listing->location }}" />
                </div>

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">{{ __('labels.l_listing_contact_email') }}</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ $listing->email }}" />
                </div>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="website" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_website') }}
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                        value="{{ $listing->website }}" placeholder="{{ __('labels.l_listing_tags_placeholder') }}"/>
                </div>

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_tags') }}
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Example: Junior,Middle,Senior,etc" value="{{ $listing->tags }}" />
                </div>

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_picture') }}
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"/>

                    <img class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/job.png')}}" alt="" />

                </div>

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        {{ __('labels.l_listing_job_description') }}
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                        placeholder="Include tasks, requirements, salary, etc">
                        {{ $listing->description }}
</textarea>
                </div>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6 text-center">
                    <button class="text-white py-2 px-4 hover:bg-black text-lg btn-gradient">
                        {{ __('labels.l_listing_update_btn') }}
                    </button>

                    <a href="{{ route('home_url') }}" class="text-black ml-4">
                        {{ __('labels.l_back') }}
                    </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>

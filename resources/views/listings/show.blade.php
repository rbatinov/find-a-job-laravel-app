<x-layout>

    
    <x-back-button :routeName="'home_url'"></x-back-button>
    
    <x-card  class="mt-10 x-card">

        
        <div class="flex flex-col items-center justify-center text-center">
            <a href="{{ route('company_listings_url', ['company_id' => $listing->company_id ] ) }}" title="{{ __('labels.l_click_to_view_all_company_listings_title') }}">
                <img class="w-48 mr-6 mb-6" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/job.png') }}" alt="{{ config('message.alt_logo_name') }}" />
            </a>

            <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
            <div class="text-xl font-bold mb-4">
                <a href="{{ route('company_listings_url', ['company_id' => $listing->company_id ] ) }}" title="{{ __('labels.l_click_to_view_all_company_listings_title') }}">{{ $listing['company']['name'] }}
                </a>        
            </div>
            
            <x-listing-tags :tagsCsv="$listing->tags">

            </x-listing-tags>

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot c-purple"></i> {{ $listing->location }}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    {{ __('labels.l_show_job_dsc') }}
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{ $listing->description }}
                    </p>
                    

                    <a href="mailto:{{ $listing->email }}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 main-gradient"><i
                            class="fa-solid fa-envelope"></i>
                        {{ __('labels.l_contact_employer_btn') }}</a>

                    <a href="{{ $listing->website }}" target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80 main-gradient"><i class="fa-solid fa-globe"></i>
                        {{ __('labels.l_visit_website_btn') }}</a>
                </div>
            </div>
        </div>
    </x-card>

    @auth
    @if($listing->user_id == auth()->user()->id)
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="{{ route('listing_edit_form_url', ['listing' => $listing->id ] ) }}"><i class="fa-solid fa-pencil"></i> {{ __('labels.l_edit') }}</a>

            <form method="post" action="{{ route('delete_listing_url', ['listing' => $listing->id]) }}">
                @csrf
                @method('delete')
                <button class="text-dash-red-500"><i class="fa-solid fa-trash"></i>{{ __('labels.l_delete') }}</button>
            </form>
        </x-card>
    
    @endif
    @endauth
</x-layout>
@props(['listing', 'rowNumber'])

<x-card>
    <div class="flex">
        <div 
        style="    text-align: center;
        margin-top: auto;
        margin-bottom: auto;
        font-size: 1.7rem;
        padding-right: 1rem;
        word-break: normal; width:5%;"
        
        title="{{ __('labels.l_click_to_view_title') }}"
        >
            <a href="{{ route('show_single_listing_url', ['listing' => $listing->id ] ) }}
                " style="color: #B24592; font-weight:bold;">#{{ $rowNumber }}</a>
        </div>

        <div class="my-auto" style="width:25%;" >
            <a 
                href="{{ route('company_listings_url', ['company_id' => $listing->company_id ] ) }} " 
                
                >
                <img
                    class="hidden w-64 mr-6 md:block p-10  sm:p-3"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/job.png') }}"
                    alt="{{ config('message.alt_logo_name') }}"
                    title="{{ __('labels.l_click_to_view_all_company_listings_title') }}"
                />
            </a>
        </div>

        <div style="width:70%">
            <h3 class="text-2xl">
                <a href="{{ route('show_single_listing_url', ['listing' => $listing->id]) }}"
                    title="{{ __('labels.l_click_to_view_title') }}">{{ $listing['title'] }}</a>
            </h3>
            
            <div class="text-xl font-bold mb-2 mt-2">
                <a href="{{ route('company_listings_url', ['company_id' => $listing->company_id ] ) }}" title="{{ __('labels.l_click_to_view_all_company_listings_title') }}"><?php echo is_null($listing->company) ? "" : $listing->company->name ?> 
                </a>    
            </div>
            
            <div class="mb-4">
                <a style="text-decoration:underline;" href="{{ $listing->website }}">{{ $listing['website'] }}</a>
                |
                <a style="text-decoration:underline;" href="mailto:{{ $listing->email }}">{{ $listing['email'] }}</a>
            </div>

            <x-listing-tags :tagsCsv="$listing->tags">

            </x-listing-tags>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot c-purple"></i> {{ $listing['location'] }}
            </div>
        </div>

        
    </div>
</x-card>
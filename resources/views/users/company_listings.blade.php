<x-layout>


<div class="p-2 md:mx-24 min-[320px]:mx-4 mt-8 text-center " style="line-height:3rem;">
    <span class="text-4xl" style="text-decoration: underline; color:#B24592; font-weight:bold;">{{ $listings->isEmpty() ? "" : $listings->first()->company->name }}</span>
    
</div>

<div class="p-2 md:mx-24 min-[320px]:mx-4 text-center " style="line-height:3rem;">
    <span class="text-2xl" style="text-decoration: underline; color:#B24592; font-weight:bold;">{{ __('labels.l_company_listings_subheader') }}</span>
    
</div>

<div class="mt-12">
    @unless (count($listings) == 0)
        @foreach ($listings as $key => $listing)
            <x-listing-card :listing="$listing" :rowNumber="$key+1">

            </x-listing-card>

            
        @endforeach
    @else
        <<x-no-listings></x-no-listings>
    @endunless
</div>

</x-layout>
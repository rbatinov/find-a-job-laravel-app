@props(['listing'])


<x-card>
    <div class="flex">
        <a href="/listings/{{ $listing->id }}">
            <img
                class="hidden w-64 mr-6 md:block p-10"
                src="{{ asset('images/job.png') }}"
                alt=""
            />
        </a>
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing['title'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing['company'] }}</div>
            
            <x-listing-tags :tagsCsv="$listing->tags">

            </x-listing-tags>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot c-purple"></i> {{ $listing['location'] }}
            </div>
        </div>
    </div>
</x-card>
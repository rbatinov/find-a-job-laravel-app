<x-layout>

    <div class="mx-4">
        <x-card class="p-10 rounded mt-10">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    {{ __('labels.l_manage_listings') }}
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                @unless($listings->isEmpty())
                    @foreach ( $listings as $key => $listing)
                                            
                    
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" style="color: #B24592;font-weight: bold;">
                                <a href="{{ route('listing_edit_form_url', ['listing' => $listing->id ] ) }}">#{{ $key + 1 }}</a></td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('show_single_listing_url', ['listing' => $listing->id]) }}">
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('listing_edit_form_url', ['listing' => $listing->id ] ) }}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                        {{ __('labels.l_edit') }}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="post" action="{{ route('delete_listing_url', ['listing' => $listing->id]) }}">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="text-red-600">
                                        <i class="fa-solid fa-trash-can"></i>
                                        {{ __('labels.l_delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else 
                        <x-no-listings></x-no-listings>
                @endunless
                </tbody>
            </table>
      

    </x-card>
</div>

</x-layout>

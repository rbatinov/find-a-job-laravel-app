<!-- Search -->
<form action="{{ route('home_url') }}">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none custom-input"
            placeholder="{{ __('labels.l_search_placeholder') }}"
            title="{{ __('labels.l_search_title') }}"
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg hover:bg-red-600 btn-gradient"
                title="{{ __('labels.l_search_btn_title') }}"
            >
                {{ __('labels.l_search_btn') }}
            </button>
        </div>
    </div>
</form>
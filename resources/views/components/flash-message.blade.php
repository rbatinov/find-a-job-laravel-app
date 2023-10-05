@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-700"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"

        class="fixed-top-0 left-1/2 transform transalte-x-1/2 main-gradient text-white px-24 py-3 text-center"
     style="position: fixed;
     top: 3%;
     z-index: 99999999999;
     width: 50%;
     left: 26%;
     border-radius: 15px;">
        <p>{{ session('message') }}</p>
    </div>
@endif
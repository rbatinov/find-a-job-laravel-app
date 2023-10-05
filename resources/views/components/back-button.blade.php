@props(['routeName'])

<div class="mx-24 mt-10">
    <a class="btn-gradient" href="{{ route($routeName) }}">{{ __('labels.l_back_btn') }}</a>
</div>

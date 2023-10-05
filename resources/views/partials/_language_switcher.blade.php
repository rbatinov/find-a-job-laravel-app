@php
    $available_locales = config('app.available_locales');
    $current_locale = app()->getLocale();;
@endphp

<div class="text-right" title="{{ __('labels.l_choose_lang') }}">
    <select onchange="change_language(this)" style="    border-radius: 15px;
    padding: 6px; width:100%;">
        <option value="en" >{{ __('labels.l_choose_lang') }}</option>

        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <option value="{{ $available_locale }}" selected>{{ __('labels.' . $locale_name) }}</option>

            @else
                <option value="{{ $available_locale }}">{{ __('labels.' . $locale_name) }}</option>
            @endif
        @endforeach
    </select>
</div>


<script>
    function change_language(element) {
        window.location.href = '/language/' + element.value;
    }
</script>



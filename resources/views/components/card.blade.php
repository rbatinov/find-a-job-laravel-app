

<div {{ $attributes->merge(
        ['class' => 'bg-gray-50 border border-gray-200 rounded p-6 md:mx-24 min-[320px]:mx-4 mb-4 x-card'
        ]) }}
        
    style='box-shadow: 0px 0px 3px gray; box-shadow: 0px 0px 5px #8e0393;
    background: #8e039308; word-break:break-word; '
        
        
        >
    {{ $slot }}
</div>

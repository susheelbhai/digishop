<th colspan="{{ $colspan }}" {{ $attributes->merge(['class'=>'px-6 py-3']) }}>
    {{ $data2 ?? '' }}
    {{ $slot }}
</th>
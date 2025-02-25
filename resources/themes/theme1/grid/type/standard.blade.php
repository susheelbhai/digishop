

@if ($type == 'row')
<div class="grid grid-cols-{{ $div }} gap-5">
    {{ $slot }}
</div>
@endif

@if ($type == 'col')
<div class="grid grid-cols-{{ $div }} gap-5">
    {{ $slot }}
</div>
@endif


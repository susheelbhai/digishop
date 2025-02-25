<div {{ $attributes->merge(["class"=>"mt-4 mb-8 p-5 border border-2 rounded-lg font-bold"]) }}>
    <div class="mt-[-36px] mb-5 text-2xl">
        <h3 class="inline bg-light px-2">{{ $title }}</h3>
    </div>
    <div class="grid grid-cols-2 gap-x-5">
        {{$slot}}
    </div>
</div>
<x-form.type.standard :title="$title" :action="$action" :submitName="$submitName" div=2>
    <x-form.element.input1 name="from_date" label="From Date" type="date" :value="$from_date" required="required" div=1 />
    <x-form.element.input1 name="to_date" label="Till Date" type="date" :value="$to_date" required="required" div=1 />
    {{ $slot }}
</x-form.type.standard>
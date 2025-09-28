<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Dashboard | {{ config('app.name') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </x-slot>

    <x-form.element.button1 :href="route('order.create')" title="Create Order" type="add" div="4" />

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <x-card.type.standard class="relative overflow-x-auto">
            <x-slot name="header">
                Monthly Chart
            </x-slot>
            <div class="p-8">
                <canvas id="monthly_chart"></canvas>
            </div>
        </x-card.type.standard>

        <x-card.type.standard class="relative overflow-x-auto">
            <x-slot name="header">
                Daily Chart
            </x-slot>
            <div class="p-8">
                <canvas id="daily_chart"></canvas>
            </div>
        </x-card.type.standard>
    </div>

    @livewire('business-owner.order-list', ['page_heading' => 'Todays Non GST Orders', 'tax_type_id'=>1])
    @livewire('business-owner.order-list', ['page_heading' => 'Todays GST Orders', 'tax_type_id'=>2])

    <script>
        const monthly_chart = document.getElementById('monthly_chart');
        const daily_chart = document.getElementById('daily_chart');

        new Chart(monthly_chart, {
            type: 'line',
            data: {
                labels: [
                    @foreach ($monthly_chart_data as $i)
                        "{{ $i['months'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Month wise sales',
                    data: [
                        @foreach ($monthly_chart_data as $i)
                            "{{ $i['sums'] }}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(daily_chart, {
            type: 'line',
            data: {
                labels: [
                    @foreach ($daily_chart_data as $i)
                        "{{ $i['months'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Daily sales',
                    data: [
                        @foreach ($daily_chart_data as $i)
                            "{{ $i['sums'] }}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</x-layout.business-owner.app>

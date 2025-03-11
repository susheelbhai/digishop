<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Checkout | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="w-sm">
            @php
                $gst_percentage = 18;
            @endphp
            <x-card.type.standard>
                <x-slot name="header">
                    Checkout
                </x-slot>



                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Price
                                </th>
                                <td class="px-6 py-4">
                                    {{ $request['amount'] }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    GST (18%)
                                </th>
                                <td class="px-6 py-4">
                                    {{ $request['amount'] * (0.01 * $gst_percentage) }}
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Total
                                </th>
                                <td class="px-6 py-4">
                                    {{ $request['amount'] * (1 + 0.01 * $gst_percentage) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <form action="{{ route('pay') }}" method="post">
                    @csrf
                    <x-form.element.input1 name="action_url" type="hidden" value="{{ route('dashboard') }}" />
                    <x-form.element.input1 name="redirect_url" type="hidden"
                        value="{{ route('transaction.index') }}" />
                    <x-form.element.input1 name="business_id" type="hidden"
                        value="{{ Auth::guard('business_owner')->user()->business_id }}" />
                    <x-form.element.input1 name="name" type="hidden"
                        value="{{ Auth::guard('business_owner')->user()->name }}" />
                    <x-form.element.input1 name="email" type="hidden"
                        value="{{ Auth::guard('business_owner')->user()->email }}" />
                    <x-form.element.input1 name="phone" type="hidden"
                        value="{{ Auth::guard('business_owner')->user()->phone }}" />
                    <x-form.element.input1 name="amount" type="hidden" value="{{ $request['amount'] * 1.18 }}" />
                    <x-form.element.input1 name="gst_percentage" type="hidden" value="{{ $gst_percentage }}" />
                    <x-ui.button.small style="primary" class="m-3" name="button" type="submit" title="Pay Now" />
                </form>
            </x-card.type.standard>

        </div>
    </section>
</x-layout.business-owner.app>

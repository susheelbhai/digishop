<x-mail::message>
# Your onboard application is received

Dear {{ $data['partner']['name'] }},

Onboard application for {{ $data['name'] }} is received.
    
<x-mail::button :url="route('partner.business_application.show', $data['id'])">
View Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

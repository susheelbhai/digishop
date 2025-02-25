<x-mail::message>
# Your onboard application is rejected

Dear {{ $data['partner']['name'] }},

Sorry, Your onboard application for {{ $data['name'] }} is rejected.
    
<x-mail::button :url="route('partner.business_application.show', $data['id'])">
View Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

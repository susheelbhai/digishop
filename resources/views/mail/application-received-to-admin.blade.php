<x-mail::message>
# Onboard application is received

Dear {{ config('mail.admin_name') }},

{{ $data['partner']['name'] ?? 'Admin'}} has submitted the onboard application for {{ $data['name'] }}.

Followings are the detail.


<x-mail::button :url="route('admin.business_application.show', $data['id'])">
View Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

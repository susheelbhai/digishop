<x-mail::message>
# Your onboard application is received

Dear {{ $data['owner_name'] }},

We have successfully received the onboard application for your business {{ $data['name'] }}.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

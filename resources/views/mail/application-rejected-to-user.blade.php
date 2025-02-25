<x-mail::message>
# Your onboard application is rejected

Dear {{ $data['owner_name'] }},

Your application is rejected for your business {{ $data['name'] }} due to the following reason.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

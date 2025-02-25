<x-mail::message>
# Your onboard application is approved

Dear {{ $data['owner_name'] }},

Congratulations, Your onboard application is approved for your business {{ $data['name'] }}.

You can login to your dashboard using the following credientials.

<table>
<tr>
<td> User Name </td>
<td> : {{ $data['owner_email'] }} </td>
</tr>
<tr>
<td> Password </td>
<td> : {{ $user_password }} </td>
</tr>
</table>

<x-mail::button :url="route('login')">
Login Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

<x-mail::message>
# Welcome to Digishop as a partner

Dear {{ $data['name'] }},

Congratulations, You have successfuly registerd as a partner.

You can login to your dashboard using the following credientials.

<table>
<tr>
<td> User Name </td>
<td> : {{ $data['email'] }} </td>
</tr>
<tr>
<td> Password </td>
<td> : {{ $user_password }} </td>
</tr>
</table>

<x-mail::button :url="route('partner.login')">
Login Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

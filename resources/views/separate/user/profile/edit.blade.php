<x-layout.user.app>
    <x-slot name="head">
        <title> Edit Profile  | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Edit Profile" action="{{ route('profile.update', $user->id) }}" div=1>
        @method('patch')
        <x-grid.type.standard type="col" div="2">
            <x-form.element.input1 name="name" :value="$user['name']" label="Name" required="required" div="1" />
            <x-form.element.input1 name="email" :value="$user['email']" label="Email" required="required" div="1" />
            <x-form.element.input1 name="phone" :value="$user['phone']" label="Phone" type="number" div="1" required="required" />
        </x-grid.type.standard>
        <x-form.element.input-img name="profile_pic" :value="asset($user['profile_pic'])" label="Profile Pic" type="image" div="4" ratio="125" />
        
    </x-form.type.standard>

    

</x-layout.user.app>

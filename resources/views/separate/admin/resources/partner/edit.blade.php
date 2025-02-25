<x-layout.admin.app>
    <x-slot name="head">
        <title> Edit Partner  | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Edit Partner" action="{{ route('admin.partner.update', $user->id) }}">
        @method('patch')
            <x-form.element.input1 name="name" :value="$user['name']" label="Name" required="required" />
            <x-form.element.input1 name="email" :value="$user['email']" label="Email" required="required" />
            <x-form.element.input1 name="phone" :value="$user['phone']" label="Phone" type="number" required="required" />
            <x-form.element.input1 name="designation" :value="$user['designation']" label="Designation" type="text" required="required" div="2" />
            <x-form.element.input1 name="theme_id" :value="$user['theme_id']" label="Theme" type="select" :options="$themes" required="required" div="2" />
            <x-form.element.input1 name="gender_id" :value="$user['gender_id']" label="Gender" type="select" :options="$genders"  required="required" div="2" />
            <x-form.element.input1 name="color1" :value="$user['color1']" label="Color 1" type="color" required="required" div="2" />
            <x-form.element.input1 name="color2" :value="$user['color2']" label="Color 2" type="color" required="required" div="2" />
            <x-form.element.input1 name="color3" :value="$user['color3']" label="Color 3" type="color" required="required" div="2" />
            <x-form.element.input-img name="profile_pic" :value="asset($user['profile_pic'])" label="Profile Pic" type="image" div="6" ratio="125" />
        
    </x-form.type.standard>

    

</x-layout.admin.app>

<x-layout.admin.app>
    <x-slot name="head">
        <title> Add Important Link  | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Add Important Link" action="{{ route('admin.partner.store') }}">
        <x-form.element.input1 name="name" label="Name" type="text" required="required" div="2" />
        <x-form.element.input1 name="email" label="Email" type="email" required="required" div="2" />
        <x-form.element.input1 name="phone" label="Phone" type="number" required="required" div="2" />
        <x-form.element.input1 name="designation" label="Designation" type="text" required="required" div="2" />
        <x-form.element.input1 name="theme_id" label="Theme" type="select" :options="$themes" required="required" div="2" />
        <x-form.element.input1 name="gender_id" label="Gender" type="select" :options="$genders"  required="required" div="2" />
        <x-form.element.input1 name="color1" label="Color 1" type="color" required="required" div="2" />
        <x-form.element.input1 name="color2" label="Color 2" type="color" required="required" div="2" />
        <x-form.element.input1 name="color3" label="Color 3" type="color" required="required" div="2" />
        <x-form.element.input-img name="profile_pic" :value="asset('images/profile_pic/dummy.png')" label="Profile Pic" type="image" div="6" ratio="125" />
        <x-form.element.input1 name="is_active" label="Status" type="switch" :value="1" />
    </x-form.type.standard>

</x-admin.app-layout>

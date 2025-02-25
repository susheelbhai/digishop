<x-layout.sidebar.group icon="ri-dashboard-line" name="Menu">
    <x-layout.sidebar.li1 icon="fas fa-tv" :href="route('admin.dashboard')" name="Dashboard" />
    <x-layout.sidebar.li1 icon="fa-solid fa-people-arrows" :href="route('admin.partner.index')" name="Partner" />
    <x-layout.sidebar.li1 icon="fas fa-clipboard-question" :href="route('admin.userQuery.index')" name="User Query" />
    
    <x-layout.sidebar.li2 icon="fa fa-cog" name="Setting">
        <x-layout.sidebar.li21 :href="route('admin.settings.general')" name="General Setting" />
        <x-layout.sidebar.li21 :href="route('admin.settings.advanced')" name="Advance Setting" />
    </x-layout.sidebar.li2>
</x-layout.sidebar.group>

<x-layout.sidebar.li1 name="User" href="{{ route('admin.user.index') }}" icon="fas fa-user" />
<x-layout.sidebar.li1 name="Manual Webhook" href="{{ route('admin.manualWebhook') }}" icon="fa-solid fa-indian-rupee-sign" />

<x-layout.sidebar.group name="Business">
    <x-layout.sidebar.li1 name="All Business" href="{{ route('admin.business.index') }}" icon="fas fa-city" />

    <x-layout.sidebar.li2 name="Business Application" icon="fas fa-file-alt">
        <x-layout.sidebar.li21 name="All Application" href="{{ route('admin.business_application.index') }}" />
        <x-layout.sidebar.li21 name="Create Business" href="{{ route('admin.business_application.create') }}" />
    </x-layout.sidebar.li2>
    <x-layout.sidebar.li2 name="Invoice Settings" icon="fas fa-file-alt">
        <x-layout.sidebar.li21 name="Invoice Format" href="{{ route('admin.invoiceFormat.index') }}" />
        <x-layout.sidebar.li21 name="Invoice Numbers" href="{{ route('admin.invoiceNumber.index') }}" />
    </x-layout.sidebar.li2>

</x-layout.sidebar.group>


<x-layout.sidebar.li2 icon="fas fa-file-alt" name="Pages">
    <x-layout.sidebar.li21 :href="route('admin.pages.homePage')" name="Home" />
    <x-layout.sidebar.li21 :href="route('admin.pages.aboutPage')" name="About Us" />
    <x-layout.sidebar.li21 :href="route('admin.pages.contactPage')" name="Contact Us" />
    <x-layout.sidebar.li21 :href="route('admin.testimonial.index')" name="Testimonial" />
    <x-layout.sidebar.li21 :href="route('admin.pages.tncPage')" name="Terms & Conditions" />
    <x-layout.sidebar.li21 :href="route('admin.pages.privacyPage')" name="Privacy Policy" />
</x-layout.sidebar.li2>

<x-layout.sidebar.li2 icon="fab fa-pagelines" name="Layouts">
    <x-layout.sidebar.li32 name="Footer">
        <x-layout.sidebar.li21 href="{{ route('admin.important_links.index') }}" name="Important Links" />
    </x-layout.sidebar.li32>
</x-layout.sidebar.li2>

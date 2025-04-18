{{-- <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
    <div class="header-info2 d-flex align-items-center border">
        <img src="{{ $profile_pic }}" alt="">
        <div class="d-flex align-items-center sidebar-info">
            <div>
                <span class="font-w700 d-block mb-2">{{ $name  }}</span>
                <small class="text-end font-w400">{{ $designation }}</small>
            </div>
            <i class="fas fa-sort-down ms-4"></i>
        </div>
        
    </div>
</a> --}}

<div>
    <button type="button"
        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        aria-expanded="false" data-dropdown-toggle="dropdown-user">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full"
            src="{{ $profile_pic ?? 'https://flowbite.com/docs/images/people/profile-picture-5.jpg' }}" alt="user photo">
    </button>
</div>
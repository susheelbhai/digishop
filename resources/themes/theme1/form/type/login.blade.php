<div class="col-xl-12">
    <div class="auth-form">
        <div class="text-center mb-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo/'.config('app.dark_logo', 'dummy.png')) }}" width="120px">
            </a>
        </div>
        <h4 class="text-center mb-4">{{ $title }}</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            {{ $slot }}
            <div class="text-center">
                <x-ui.button.full type="submit">{{ $submitName }}</x-ui.button.full>
            </div>
        </form>

    </div>
</div>
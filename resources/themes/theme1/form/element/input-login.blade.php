@php

    switch ($div) {
        case 1:
            $col_class = 'col-md-12';
            break;

        default:
            $col_class = 'col-md-6';
            break;
    }
    
@endphp

<div class="{{ $col_class }}">
    @if ($type == 'text' || $type == 'number' || $type == 'password' || $type == 'file' || $type == 'email')
        <label for="{{ $name }}" class="block text-sm/6 font-medium text-gray-900">
            <strong>{{ $label }}</strong>
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <input class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 outline-indigo-600 border border-indigo-600" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" {{ $required }} {{ $attributes }}>
    @endif

    @if ($type == 'switch')
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label> <br>
        <label class="slide_check_box_toggle" for="{{ $name }}">
            <input name="{{ $name }}" id="{{ $name }}" type="checkbox"
                {{ $value == 1 ? 'checked' : '' }} {{ $attributes }}>
            <span class="slide_check_box"></span>
            <span class="slide_check_box_labels" data-on="Active" data-off="Not Active"></span>
        </label>
    @endif

    @if ($type == 'select')
        <label class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <select name="{{ $name }}" id="{{ $name }}" class="form-control wide" {{ $attributes }}>
            <option value="">Choose...</option>
            @foreach ($options as $i)
                <option value="{{ $i->id }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
                </option>
            @endforeach
        </select>
    @endif

    @if ($type == 'hidden')
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" {{ $attributes }}>
    @endif

    @if ($type == 'remember')
        <div class="row d-flex justify-content-between mt-4 mb-2">
            <div class="mb-3">
                <div class="form-check custom-checkbox ms-1">
                    <input type="checkbox" class="form-check-input" id="{{ $name }}" {{ $attributes }}>
                    <label class="form-check-label" for="{{ $name }}">
                        {{ $label }}
                    </label>
                </div>
            </div>
        </div>
    @endif

    @error($name)
        <x-form.validation-error :value="$message" />
    @enderror
</div>

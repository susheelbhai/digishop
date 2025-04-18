
<div class="mb-3 grid grid-cols-{{ $div }}">
    @if ($type == 'text' || $type == 'number' || $type == 'password' || $type == 'email' || $type == 'date')
    <div>
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" {{ $required }} {{ $attributes }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" />
    </div>
    @endif
    @if ($type == 'file')
    <div>
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" {{ $required }} {{ $attributes }} class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" placeholder="John" />
    </div>
    @endif
    
    @if ($type == 'textarea')
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <textarea class="form-control" name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" {{ $required }} {{ $attributes }}>{{ old($name, $value) }}</textarea>
    @endif

    @if ($type == 'switch')
        <label for="{{ $name }}" class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label> <br>
        

        <label class="inline-flex items-center cursor-pointer">
            <input name="{{ $name }}" id="{{ $name }}" class="sr-only peer" type="checkbox"
                {{ $value == 1 ? 'checked' : '' }} {{ $attributes }}>
            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
          </label>
    @endif

    @if ($type == 'select')
        <label class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <select name="{{ $name }}" id="{{ $name }}" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" {{ $attributes }}>
            <option value="">Choose...</option>
            @foreach ($options as $i)
                <option value="{{ $i->id }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
                </option>
            @endforeach
        </select>
    @endif

    @if ($type == 'color')
        <div class="mb-3">
            <div class="example">
                <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                <input name="{{ $name }}" id="{{ $name }}"  type="text" class="as_colorpicker form-control" value="{{ $value }}" {{ $required }}>
            </div>
            
        </div>
    @endif

    @if ($type == 'date_picker')
        <div class="mb-3">
            <div class="example">
                <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                <input name="datepicker" class="datepicker-default form-control" id="datepicker">
            </div>
            
        </div>
    @endif


    @if ($type == 'hidden')
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" {{ $attributes }}>
    @endif

     
    @if ($type == 'editor')
    <style>
         .cke_contents{
            height: 320px !important;
        }
    </style>
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <textarea class="ck_editor" name="{{ $name }}" id="{{ $name }}" {{ $attributes }}>{{ old($name, $value) }}</textarea>
        <script>
            $(function () {
                "use strict";
                CKEDITOR.replace('{{ $name }}')
            });
        </script>
    @endif

    @error($name)
        <x-form.validation-error :value="$message" />
    @enderror
</div>

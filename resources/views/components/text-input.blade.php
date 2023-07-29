@props([
'name',
'label' => '',
'type' => 'text',
'value' => '',
'placeholder' => ''
])

<div class="form-grup row mb-2">
    @if ($label != '')
    <label for="{{ $name }}" class="form-label col-sm-2">{{ $label }}</label>
    @endif
    <div class="col-sm-10">
        <input id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
            name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
        <div class="invalid-feedback">
            @error($name)
            {{ $message }}
            @enderror
        </div>
    </div>
</div>
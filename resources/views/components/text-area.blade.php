@props([
'name',
'label' => '',
'value' => '',
'placeholder' => ''
])

<div class="form-grup row mb-2">
    @if ($label != '')
    <label for="{{ $name }}" class="form-label col-sm-2">{{ $label }}</label>
    @endif
    <div class="col-sm-10">
        <textarea id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
            placeholder="{{ $placeholder }}">
            {{ old($name, $value) }}
        </textarea>
        <div class="invalid-feedback">
            @error($name)
            {{ $message }}
            @enderror
        </div>
    </div>
</div>
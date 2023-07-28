@props([
'name',
'label' => '',
'value' => '',
'placeholder' => '',
'data' => [],
'required' => 'false'
])

<div class="form-grup row mb-2">
    @if ($label != '')
    <label class="form-label col-sm-2" for="{{ $name }}">{{ $label }}</label>
    @endif
    <div class="col-sm-10">
        <select id="{{ $name }}" class="form-control selectpicker @error($name) is-invalid @enderror" name="{{ $name }}"
            value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $required=='true' ? 'required' : '' }}>
            @foreach ($data as $item)
            <option value="{{ $item['value'] }}" {{ old($name, $value)==$item['value'] ? 'selected' : '' }}>{{
                $item['label'] }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error($name)
            {{ $message }}
            @enderror
        </div>
    </div>
</div>
@props([
'type' => 'text',
'name',
'value' => old($name),
'placeholder' => '',
'required' => '',
'classList' => '',
'disabled' => '',
])
<input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror {{ $classList }}"
    value="{{ $value }}" id="{{ $name }}" placeholder="{{ $placeholder }}" {{ $required }} {{ $disabled }}>
@error($name)
<span class="text-danger" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
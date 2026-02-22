@props(['name', 'required' => '', 'multiple' => '', 'class' => '', 'placeholder' => ''])
<select name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'form-control
    form-select']) }} {{ $required }} {{
    $multiple }}>
    {{ $slot }}
</select>
@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
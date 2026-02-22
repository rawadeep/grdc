@props(['name', 'value' => old($name), 'placeholder' => get_phrase('Content') . '...'])
<textarea name="{{ $name }}" placeholder="{{ $placeholder }}" rows="4" {{
    $attributes->merge(['class' => 'form-control']) }}>{!! $value !!}</textarea>
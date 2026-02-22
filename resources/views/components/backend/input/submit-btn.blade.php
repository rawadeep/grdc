@props(['text' => get_phrase('Create'), 'btn' => 'primary', 'classList' => ''])
<button class="btn btn-{{ $btn }} font-weight-medium auth-form-btn {{ $classList }}">{{ get_phrase($text) }}</button>
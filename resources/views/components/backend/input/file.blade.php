@props(['name' => 'file', 'type' => get_phrase('Image'), 'required' => ''])
<input type="file" name="{{ $name }}" class="file-upload-default">
<div class="input-group col-xs-12">
    <input type="text" name="fileName" class="form-control file-upload-info @error('email') is-invalid @enderror"
        placeholder="Upload {{ $type }}" {{ $required }}>
    <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button">{{ get_phrase('Upload') }}</button>
    </span>
</div>
@error($name)
<span class="text-danger" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
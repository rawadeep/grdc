@props(['action' => '#'])
<form action="{{ $action }}" method="post" style="display: inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="
        if( !confirm('{{ get_phrase('Are you sure you want to delete? All related data would be affected.') }}')) {
            event.preventDefault();
        }
    " class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
</form>
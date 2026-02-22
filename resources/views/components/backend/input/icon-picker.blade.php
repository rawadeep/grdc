@props(['value' => ''])
<div class="form-group">
    <label class="form-label" for="icon">{{ get_phrase('Choose Icon') }}</label>
    <div class="icon-picker-container">
        <input type="text" id="icon" name="icon" class="icon-picker-input"
            placeholder="{{ get_phrase('Click to select an icon') }}" value="{{ $value }}" required readonly>
        <button type="button" class="icon-picker-trigger">
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="icon-picker-dropdown">
            <input type="text" class="icon-picker-search" placeholder="Search icons...">
            <div class="icon-picker-grid"></div>
        </div>
    </div>
</div>
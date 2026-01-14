@php
    $list = [10, 20, 30];
    $selected = Request::get('limit', $list[0]);
@endphp

<div class="form-group">
    <select class="form-select" name="list" id="">
        @foreach ($list as $value)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">{{ $label ?? "Status"}} <span class="text-danger">*</span></label>
    <select name="{{$name ?? "status"}}" class="form-control pe-4 @error($name ?? 'status') is-invalid @enderror">
        <option value="active" {{ $selected == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $selected == 'inactive' ? 'selected' : ''}}>Inactive</option>
    </select>
    @error($name ?? 'status')
    <div class="invalid-feedback message">
        {{ $message }}
    </div>
    @enderror
</div>

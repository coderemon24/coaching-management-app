<div class="form-group">
    <label for="name">{{ $label ?? "Status"}} <span class="text-danger">{{ $required }}</span></label>
    <select name="{{$name ?? "status"}}" class="form-control pe-4 @error($name ?? 'status') is-invalid @enderror">
        @foreach($options as $key => $option)
            <option value="{{$key}}" {{ $selected == $key ? 'selected' : '' }}>{{$option}}</option>
        @endforeach
    </select>
    @error($name ?? 'status')
    <div class="invalid-feedback message">
        {{ $message }}
    </div>
    @enderror
</div>

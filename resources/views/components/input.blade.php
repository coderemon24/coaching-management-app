<div class="form-group">
    <label for="name"> {{$label}} <span class="text-danger">{{ $required }}</span></label>
    <input type="{{$type ?? "text"}}" name="{{$name ?? "name"}}" placeholder="{{$placeholder ?? "Placeholder"}}"
        class="form-control @error($name ?? 'name') is-invalid @enderror">
    @error($name ?? 'name')
    <div class="invalid-feedback message">
        {{ $message }}
    </div>
    @enderror
</div>

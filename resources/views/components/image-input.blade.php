<div class="info_wrapper form-group">
    <label for="icon" class="text-left">Image <span class="text-danger">*</span></label>
    <input type="file" name="{{$name ?? "image"}}" class="input_file d-none @error($name ?? 'image') is-invalid @enderror" id="main_logo" />
    <label for="main_logo" class="preview_wrapper">
        <img width="50" src="{{$image ?? asset('assets/upload-icon.png')}}" class="preview_image">
        <div class="logo_text file_name">Choose file</div>
    </label>
    @error($name ?? 'image')
    <div class="invalid-feedback message">
        {{ $message }}
    </div>
    @enderror
</div>

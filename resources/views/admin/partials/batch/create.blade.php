@extends('admin.master.master')
@section('title')
    Batchs
@endsection
@section('content')
    <div class="card p-4 shadow">
        <form action="{{ route('batch.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            {{-- thumb image  --}}
            {{-- <div class="file-upload border rounded col-4">
                <label>Roting <span class="text-success">(Optional)</span></label>
                <div class="image-upload-wrap">
                    <input name="photo" class="file-upload-input  @error('thumb_image') is-invalide @enderror" type='file'
                        onchange="readURL(this);" accept="image/*" />
                    <div class="drag-text">
                        <h3>Drag and drop </h3>
                    </div>
                </div>
                <div class="file-upload-content ">
                    <img class="file-upload-image" src="#" alt="your photo" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                class="image-title">Uploaded Image</span></button>
                    </div>
                </div>
                @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}



            {{-- multipal image --}}
            <div class="upload__box mt-2 border rounded">
                <div class="upload__btn-box mt-3">
                    <label class="upload__btn">
                        <p>Upload routine <i class="bi bi-file-earmark-image"></i></p>
                        <input name="routine[]" type="file" multiple="" data-max_length="20"
                            class="upload__inputfile  @error('routine') is-invalide @enderror" multiple>
                    </label>
                    @error('routine')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="upload__img-wrap"></div>
            </div>



            <div class="mb-3">
                <label for="name" class="form-label">Batch Name</label>
                <input name="name" value="{{ old('name') }}" type="name" class="form-control" id="name"
                    placeholder="Write institute name..">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex">
                <a href="{{ route('batch.index') }}" type="button" class="btn btn-dark me-2">Cancel<i
                        class="bi bi-arrow-return-left ms-2"></i>
                </a>
                <button type="submit" class="btn btn-dark">Save <i class="bi bi-floppy ms-2"></i></button>
            </div>
        </form>
    </div>
@endsection

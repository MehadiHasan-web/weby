@extends('admin.master.master')
@section('title')
    Student
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card p-4 shadow col-8">
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                {{-- teacher image  --}}
                <div class="file-upload border rounded col-4">
                    <label>Profile <span class="text-success">(Optional)</span></label>
                    <div class="image-upload-wrap">
                        <input name="photo" class="file-upload-input  @error('thumb_image') is-invalide @enderror"
                            type='file' onchange="readURL(this);" accept="image/*" />
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
                </div>


                <div class="row row-cols-2 mt-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" value="{{ old('name') }}" type="name" class="form-control" id="name"
                            placeholder="Write teacher name..">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" value="{{ old('email') }}" type="text" class="form-control" id="email"
                            placeholder="Write teacher email..">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row row-cols-2 mt-2">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" id="phone"
                            placeholder="Write phone..">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fee" class="form-label">Fee</label>
                        <input name="fee" value="{{ old('fee') }}" type="number" class="form-control" id="fee"
                            placeholder="Write fee..">
                        @error('fee')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="Address" style="height: 100px">{{ old('address') }}</textarea>
                    <label for="Address">Address</label>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1"
                                checked>
                            <label class="form-check-label" for="inlineRadio1">Mail</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Femail</label>
                        </div>
                    </div>
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex">
                    <a href="{{ route('student.index') }}" type="button" class="btn btn-dark me-2">Cancel<i
                            class="bi bi-arrow-return-left ms-2"></i>
                    </a>
                    <button type="submit" class="btn btn-dark">Save <i class="bi bi-floppy ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

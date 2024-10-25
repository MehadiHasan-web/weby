@extends('admin.master.master')
@section('title')
    Teachers
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card p-4 shadow col-12 col-md-8">
            <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
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



                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{ old('name') }}" type="name" class="form-control" id="name"
                        placeholder="Write teacher name..">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="teacher_subject" class="form-label">Teacher's Subject</label>
                    <input name="teacher_subject" value="{{ old('teacher_subject') }}" type="text" class="form-control"
                        id="teacher_subject" placeholder="Write teacher teacher subject..">
                    @error('teacher_subject')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="teacher_time" class="form-label">Teacher time</label>
                    <input name="teacher_time" value="{{ old('teacher_time') }}" type="number" class="form-control"
                        id="teacher_time" placeholder="Write teacher  subject..">
                    @error('teacher_time')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="degree" class="form-label">Teacher's degree</label>
                    <input name="degree" value="{{ old('degree') }}" type="text" class="form-control" id="degree"
                        placeholder="Write teacher degree..">
                    @error('degree')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="education_ins" class="form-label">Teacher's education ins</label>
                    <input name="education_ins" value="{{ old('education ins') }}" type="text" class="form-control"
                        id="education_ins" placeholder="Write teacher's education_ins..">
                    @error('education_ins')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Teacher's phone</label>
                    <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" id="phone"
                        placeholder="Write teacher's phone..">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="teacher_fee" class="form-label">Teacher's fee</label>
                    <input name="teacher_fee" value="{{ old('teacher_fee') }}" type="number" class="form-control"
                        id="teacher_fee" placeholder="Write teacher teacher_fee..">
                    @error('teacher_fee')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex">
                    <a href="{{ route('teacher.index') }}" type="button" class="btn btn-dark me-2">Cancel<i
                            class="bi bi-arrow-return-left ms-2"></i>
                    </a>
                    <button type="submit" class="btn btn-dark">Save <i class="bi bi-floppy ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

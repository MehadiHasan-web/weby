@extends('admin.master.master')
@section('title')
    Institutes create
@endsection
@section('content')
    <div class="card p-4 shadow">
        <form action="{{ route('institute.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            {{-- thumb image  --}}
            <div class="file-upload border rounded col-4">
                <label>Image <span class="text-success">(Optional)</span></label>
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
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" type="name" class="form-control" id="name"
                    placeholder="Write institute name..">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"
                    placeholder="Write institute email..">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" id="phone"
                    placeholder="Write institute number..">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Write institute password..">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Confirmed</label>
                <input type="password" name="password_confirmed" class="form-control" id="password"
                    placeholder="Write institute password..">
                @error('password_confirmed')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note <span class="text-success">(Optional)</span></label>
                <textarea name="note" value="{{ old('note') }}" class="form-control" id="note" rows="3"></textarea>
                @error('note')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex">
                <button type="button" class="btn btn-dark me-2">Cancel<i class="bi bi-arrow-return-left ms-2"></i>
                </button>
                <button type="submit" class="btn btn-dark">Save <i class="bi bi-floppy ms-2"></i></button>
            </div>
        </form>
    </div>
@endsection

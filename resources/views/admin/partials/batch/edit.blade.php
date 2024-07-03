@extends('admin.master.master')
@section('title')
    Batchs Edit
@endsection
@section('content')
    <div class="card p-4 shadow">
        <form action="{{ route('batch.update', $batch->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- multipal image --}}
            <div class="upload__box mt-2 border rounded d-flex">
                <div class="col-8">
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
                <div class="col-4 ">
                    {{-- priviue image  --}}
                    <div class="mt-3">
                        @isset($batch->routine)
                            @foreach (json_decode($batch->routine) as $item)
                                <img src="{{ URL::to('storage/routine/' . $item) }}" alt="" class="img-fluid rounded"
                                    style="width: 90px; height:100px; margin-bottom: 5px;">
                            @endforeach
                            <br>
                            <span class="text-muted " style="font-size: 10px">Image List</span>
                        @endisset
                    </div>
                </div>
            </div>



            <div class="mb-3">
                <label for="name" class="form-label">Batch Name</label>
                <input name="name" value="{{ old('name', $batch->name ?? '') }}" type="text" class="form-control"
                    id="name" placeholder="Write institute name..">
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

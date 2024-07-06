@extends('admin.master.master')
@section('title')
    Exam
@endsection
@section('content')
    <div class="card p-4 shadow col-8">
        <form action="{{ route('exam.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            {{-- multipal image --}}
            <div class="upload__box mt-2 border rounded">
                <div class="upload__btn-box mt-3">
                    <label class="upload__btn">
                        <p>Upload question paper <i class="bi bi-file-earmark-image"></i></p>
                        <input name="question_paper[]" type="file" multiple="" data-max_length="20"
                            class="upload__inputfile  @error('question_paper') is-invalide @enderror" multiple>
                    </label>
                    @error('question_paper')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="upload__img-wrap"></div>
            </div>

            <div class="row row-cols-2 mt-4">
                <div class="mb-3 col">
                    <label for="name" class="form-label">Select Batch</label>
                    <select class="form-select" aria-label="Default select example" name="batche">
                        <option selected disabled>Select Batch</option>
                        @isset($batch)
                            @foreach ($batch as $item)
                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                            @endforeach
                        @endisset
                    </select>
                    @error('batche')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3 col">
                    <label for="name" class="form-label">Exam Name</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name"
                        placeholder="Write exam name..">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3 col">
                    <label for="name" class="form-label">Exam Invigilator</label>
                    <input name="exam_invigilator" value="{{ old('exam_invigilator') }}" type="text" class="form-control"
                        id="name" placeholder="Write exam invigilator name..">
                    @error('exam_invigilator')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3 col">
                    <label for="name" class="form-label">Course Teacher</label>
                    <input name="course_teacher" value="{{ old('course_teacher') }}" type="text" class="form-control"
                        id="course_teacher" placeholder="Write institute course teacher..">
                    @error('course_teacher')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 col">
                    <label for="exam_topic" class="form-label">Exam Topic</label>
                    <input name="exam_topic" value="{{ old('exam_topic') }}" type="text" class="form-control"
                        id="exam_topic" placeholder="Write institute exam_topic..">
                    @error('exam_topic')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 col">
                    <label for="exam_date" class="form-label">Exam Date</label>
                    <input name="exam_date" value="{{ old('exam_date') }}" type="text" class="form-control"
                        id="exam_date" placeholder="Write institute exam date..">
                    @error('exam_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 col">
                    <label for="total_time" class="form-label">Total Time</label>
                    <input name="total_time" value="{{ old('total_time') }}" type="text" class="form-control"
                        id="total_time" placeholder="Write institute total time..">
                    @error('total_time')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 col">
                    <label for="exam_marks" class="form-label">Total Marks</label>
                    <input name="exam_marks" value="{{ old('exam_marks') }}" type="text" class="form-control"
                        id="exam_marks" placeholder="Write institute total marks..">
                    @error('exam_marks')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="flex">
                <a href="{{ route('exam.index') }}" type="button" class="btn btn-dark me-2">Cancel<i
                        class="bi bi-arrow-return-left ms-2"></i>
                </a>
                <button type="submit" class="btn btn-dark">Save <i class="bi bi-floppy ms-2"></i></button>
            </div>
        </form>
    </div>
@endsection

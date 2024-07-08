@extends('admin.master.master')
@section('title')
    Exam view
@endsection
@section('content')
    <div class=" row gap-2 mt-2">
        <div class="col-7 border shadow  p-4 rounded mb-4">
            <div class="row row-cols-2">
                <div class="col mb-3">
                    <h5>Batche</h5>
                    <p>{{ $exam->batche_id ?? '' }}</p>
                </div>

                <div class="col mb-3">
                    <h5>Exam Invigilator</h5>
                    <p>{{ $exam->exam_invigilator ?? '' }}</p>
                </div>

                <div class="col mb-3">
                    <h5>Course Teacer</h5>
                    <p>{{ $exam->course_teacher ?? '' }}</p>
                </div>

                <div class="col mb-3">
                    <h5>Exam topic</h5>
                    <p>{{ $exam->exam_topic ?? '' }}</p>
                </div>
                <div class="col mb-3">
                    <h5>Exam date</h5>
                    <p>{{ $exam->exam_date ?? '' }}</p>
                </div>
                <div class="col mb-3">
                    <h5>Exam time</h5>
                    <p>{{ $exam->total_time ?? '' }}</p>
                </div>
                <div class="col mb-3">
                    <h5>Exam marks</h5>
                    <p>{{ $exam->exam_marks ?? '' }}</p>
                </div>

            </div>
            <button class="float-end btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
                Result</button>

        </div>
        <div class="col-4 border shadow rounded  mb-4">
            <h2>Students</h2>
            <div class="mt-4  mb-3 row row-cols-1 px-2">
                @isset($batch->users)
                    @foreach ($exam->examResults as $key => $item)
                        <div class="d-flex justify-content-between  p-2 rounded border  mb-2">
                            <a href="{{ route('student.profile', $item->user->id) }}">
                                <strong class="col me-2">{{ $key + 1 }}.
                                    {{ $item->user->name ?? '' }}</strong>
                            </a>
                            <div class="d-flex justify-items-center ">
                                <div class="input-group input-group-sm ">

                                    <input value="{{ $item->marks }}" type="number" class="form-control w-50"
                                        placeholder="Marks" disabled>

                                    @if ($item->status == 0)
                                        <button disabled class="btn btn-danger" type="button">Absent</button>
                                    @else
                                        <button disabled class="btn btn-success" type="button">Attend</button>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Result</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4  mb-3 row row-cols-1 px-2">
                            @isset($batch->users)
                                @foreach ($batch->users as $key => $item)
                                    <div class="d-flex justify-content-between  p-2 rounded border  mb-2">
                                        <strong class="col me-2">{{ $key + 1 }}.
                                            {{ $item->name ?? '' }}</strong>
                                        <div class="d-flex justify-items-center ">
                                            <form class="input-group input-group-sm " action="{{ route('result.store') }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <input name="user_id" type="number" class="form-control w-50 hidden"
                                                    value="{{ $item->id ?? '' }}" hidden>
                                                <input name="exam_id" type="number" class="form-control w-50 hidden"
                                                    value="{{ $exam->id ?? '' }}" hidden>
                                                <input name="marks" type="number" class="form-control w-50"
                                                    placeholder="Marks">
                                                <button class="btn btn-outline-success" type="submit">Submit</button>
                                                <a href="{{ route('result.absent', [$item->id, $exam->id]) }}"
                                                    class="btn btn-outline-danger" type="button">Absent</a>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

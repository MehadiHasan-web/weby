@extends('admin.master.master')
@section('title')
    Exam view
@endsection
@section('content')
    <div class=" row gap-2 mt-2">
        <div class="col-12 col-md-7  border shadow  p-4 rounded mb-4">

            {{-- exam paper  --}}
            <div class="d-flex gap-2">
                <a href="{{ route('exam.index') }}" class="mt-3 btn btn-dark  shadow ">Back</a>
                <a href="{{ route('exam.edit', $exam->id) }}" class="mt-3 btn btn-dark  shadow ">Edit</a>
                <button type="button" class="mt-3 btn btn-dark  shadow" data-bs-toggle="modal" data-bs-target="#examPaper">
                   Question paper
                </button>
            </div>

            <div class="row row-cols-2 mt-2">
                <div class="col mb-3">
                    <h5>Batch</h5>
                    <p>{{ $batch->name ?? '' }}</p>
                </div>

                <div class="col mb-3">
                    <h5>Exam Name</h5>
                    <p>{{ $exam->name ?? '' }}</p>
                </div>
                <div class="col mb-3">
                    <h5>Exam Invigilator</h5>
                    <p>{{ $exam->exam_invigilator ?? '' }}</p>
                </div>

                <div class="col mb-3">
                    <h5>Course Teacher</h5>
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
                    <p>{{ $exam->total_time ?? '00' }}:00 </p>
                </div>
                <div class="col mb-3">
                    <h5>Exam marks</h5>
                    <p>{{ $exam->exam_marks ?? '' }}</p>
                </div>

            </div>
            <button class="float-end btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdropResult">Add
                Result</button>

        </div>
        <div class="col-12 col-md-4 border shadow rounded  mb-4">
            <h2>Students</h2>
            <div class="mt-4  mb-3 row row-cols-1 px-2">
                @isset($exam->examResults)
                    @forelse ($exam->examResults as $key => $item)
                        <div class="d-flex justify-content-between  p-2 rounded border  mb-2">
                            <a href="{{ route('student.show', $item->id) }}">
                                <strong class="col me-2">{{ $key + 1 }}.
                                    {{ $item->student->name ?? '' }}</strong>
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
                    @empty
                        <div class="d-fle justify-content-center">
                            <img class="img-fluid" src="{{ asset('not_found.png') }}" alt="">
                        </div>
                    @endforelse
                @endisset
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdropResult" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Result</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4  mb-3 row row-cols-1 px-2">
                            @livewire('add-result', ['batch' => $batch, 'exam' => $exam])
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- exam paper  --}}
        <div class="modal fade" id="examPaper" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Question paper</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div>
                    <div id="carouselExample" class="carousel slide ">
                        <div class="carousel-inner">
                            @isset($exam->exam_paper)
                                @foreach (json_decode($exam->exam_paper) as $image)
                                    <div class="carousel-item active rounded">
                                        <img src="{{ URL::to('storage/question/' . $image ?? '') }}" class="d-block img-fluid rounded"
                                            alt="...">
                                    </div>
                                @endforeach
                            @endisset
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
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

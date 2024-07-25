@extends('admin.master.master')
@section('title')
    Batchs show
@endsection
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="col-12  d-flex border p-4 rounded ">
        <div class="col-6">
            <h6>Batch Id : {{ $batch->id ?? '' }}</h6>
            <h4 class="card-title"> Batch name: <span class="text-info">{{ $batch->name ?? '' }}</span></h4>
            <h6>Date :<span class="ms-3 text-muted">{{ $batch->created_at->diffForHumans() ?? '' }}</span></h6>


            <div class="mt-3">
                <a type="submit" class="btn btn-dark btn-sm " href="{{ route('batch.index', $batch->id) }}"><i
                        class="bi bi-arrow-return-left"></i></a>
                <a type="submit" class="btn btn-warning btn-sm " href="{{ route('batch.show', $batch->id) }}"><i
                        class="bi bi-eye"></i></a>
                <a type="submit" class="btn btn-info btn-sm " href="{{ route('batch.edit', $batch->id) }}"><i
                        class="bi bi-pencil-square"></i></a>
            </div>

            <div class="mt-2">
                <div>
                    <h2>Teachers @isset($batch->teacher)
                            <span class="badge badge-pill text-bg-info fs-5"> {{ $batch->teacher->count() }}</span>
                        @endisset
                    </h2>
                    <div class="d-flex gap-2">
                        @isset($batch->teacher)
                            @forelse ($batch->teacher as $item)
                                <a href="{{ route('teacher.show', $item->id) }}"
                                    class="badge badge-pill text-bg-primary fs-5">{{ $item->name ?? '' }}</a>

                            @empty
                                <p>No teacher added.</p>
                            @endforelse
                        @endisset
                    </div>
                </div>

                {{-- students  --}}
                <h4 class="mt-4">Students @isset($batch->student)
                        <span class="badge badge-pill text-bg-success fs-5"> {{ $batch->student->count() }}</span>
                    @endisset
                </h4>
                <div class="me-lg-3 border p-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($batch->student)
                                @foreach ($batch->student as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="font-bold"><a class="text-bold"
                                                href="{{ route('student.show', $item->id) }}">{{ $item->name ?? '' }}</a></td>
                                        <td>Remove</td>
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                            @endisset


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- add students  --}}
        <div class="w-100 mb-5">
            <form action="{{ route('batch.add.student', $batch->id) }}" method="POST">
                @csrf
                <h2>Add Student</h2>
                <select class="js-example-basic-multiple w-100 mb-4" name="student[]" multiple="multiple">
                    @isset($students)
                        @foreach ($students as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? '' }} || {{ $item->id ?? '' }}</option>
                        @endforeach
                    @endisset
                </select>
                <h2>Add Teacher</h2>
                <select class="js-example-basic-multiple w-100" name="teacher[]" multiple="multiple">
                    @isset($teachers)
                        @foreach ($teachers as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? '' }} || {{ $item->id ?? '' }}</option>
                        @endforeach
                    @endisset
                </select>
                <button class="btn btn-dark shadow mt-2">Save</button>

            </form>


        </div>
    </div>


    <div class="pt-4 pe-4">

        <div id="carouselExample" class="carousel slide col-9">
            <div class="carousel-inner">
                @isset($batch->routine)
                    @foreach (json_decode($batch->routine) as $image)
                        <div class="carousel-item active rounded">
                            <img src="{{ URL::to('storage/routine/' . $image ?? '') }}" class="d-block img-fluid rounded"
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

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush

@extends('admin.master.master')
@section('title')
    Batchs show
@endsection
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="col-12  d-flex border p-4 rounded shadow">
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
                {{-- students  --}}
                <h4 class="mt-4">Students</h4>
                <div class="d-flex ps-3">
                    @isset($students)
                        @foreach ($students as $item)
                            @if (in_array($item->id, $selectedIdsStudents))
                                <div class="rounded-circle border border-primary d-flex justify-content-center align-items-center shadow bg-white"
                                    style="width: 48px; height:48px; margin-left:-15px;">
                                    <strong class="m-0">{{ Str::limit($item->name, 2) }}</strong>
                                </div>
                            @endif
                        @endforeach
                        <button class="btn btn-dark shadow ms-2 " data-bs-toggle="modal" data-bs-target="#allStudents">
                            Show All
                        </button>
                    @endisset

                </div>
            </div>
        </div>

        {{-- add students  --}}
        <div class="w-100 mb-5">
            <form action="{{ route('batch.add.student', $batch->id) }}" method="POST">
                @csrf
                <h2>Add Student</h2>
                <select class="js-example-basic-multiple w-100 mb-4" name="students[]" multiple="multiple">
                    @isset($students)
                        @foreach ($students as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? '' }} || {{ $item->id ?? '' }}</option>
                        @endforeach
                    @endisset
                </select>
                <h2>Add Teacher</h2>
                <select class="js-example-basic-multiple w-100" name="teachers[]" multiple="multiple">
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
        {{-- student modal  --}}
        <div class="modal fade" id="allStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Student List</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($students)
                                    @foreach ($students as $item)
                                        @if (in_array($item->id, $selectedIdsStudents))
                                            <tr>
                                                <th scope="row">{{ $item->id ?? '' }}</th>
                                                <td>{{ $item->name ?? '' }}</td>
                                                <td>Remove</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endisset


                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
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

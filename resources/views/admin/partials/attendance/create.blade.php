@extends('admin.master.master')
@section('title')
    Attendance
@endsection
@push('style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card ">
                    <div class="  card-header">
                        <h4>Mark Attendance: <span>{{ $batch->name ?? '' }}</span></h4>
                    </div>


                    <div class="card-body">
                        {{-- items --}}
                        @isset($batch->users)
                            @foreach ($batch->users as $item)
                                <div class="border rounded p-1  card position-relative mb-3" data-aos="fade-up">
                                    <h2 class="card-header">{{ $item->name ?? '' }}
                                    </h2>
                                    <div class="position-absolute top-0 end-0 pe-2 pt-2">
                                        <span class="badge text-bg-dark">{{ $item->created_at->diffForHumans() ?? '' }}</span>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('attendance.present', ['userId' => $item->id, 'batchId' => $batch->id]) }}"
                                            type="button" class="btn btn-success">Present</a>
                                        <a href="{{ route('attendance.late_present', ['userId' => $item->id, 'batchId' => $batch->id]) }}"
                                            type="button" class="btn btn-warning">Let Present</a>
                                        <a href="{{ route('attendance.absent', ['userId' => $item->id, 'batchId' => $batch->id]) }}"
                                            type="button" class="btn btn-danger">Absent</a>
                                    </div>
                                </div>
                            @endforeach
                        @endisset

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush

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
                        @livewire('student-attendance', ['batch' => $batch])
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

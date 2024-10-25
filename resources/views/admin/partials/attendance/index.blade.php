@extends('admin.master.master')
@section('title')
    Attendance
@endsection
@push('style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush
@section('content')
    <div class="">
        <div class="mt-2 row row-cols-1  row-cols-md-2 row-cols-xl-3 row-cols-xxl-4">
            @isset($batches)
                @foreach ($batches as $key => $item)
                   <div class="col">
                    <div data-aos="zoom-in-up" class="card p-4  px-5 mb-3 position-relative ">
                        <strong class="position-absolute top-0 start-0 pt-1 ps-1 ">SL: <span
                                class="text-success">{{ $key + 1 }}</span></strong>
                        <strong class="position-absolute top-0 end-0 pt-1 pe-1 ">Students: <span
                                class="text-success">{{ $item->student->count() ?? '0' }}</span></strong>
                        <h2 class="mt-2">{{ $item->name ?? '' }}</h2>
                        <a href="{{ route('attendance.index', $item->id) }}" data-aos="flip-up" data-aos-duration="1000"
                            class="btn btn-dark position-absolute bottom-0 end-0 mb-1 me-1">Visit</a>
                    </div>
                   </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush

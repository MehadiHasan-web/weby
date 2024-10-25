@extends('admin.master.master')
@section('title')
    Attendance report
@endsection
@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-8 shadow border py-4 rounded">
            <div class="text-center">
                <h2>Student Attendance Report</h2>
                <h2 class="text-muted">Batch: 2023-2024</h2>
            </div>
            {{-- table  --}}
            <div class="p-3">
                <table class="table border rounded table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Roll No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($student->attendance)
                            @forelse ($student->attendance as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td><a class="fw-bold"
                                            href="{{ route('student.show', $student->id) }}">{{ $student->name ?? '' }}</a>
                                    </td>
                                    <td>
                                        <div class="d-flex ">
                                            @switch($item->is_present)
                                                @case(0)
                                                    <span class="badge text-bg-primary">Present</span>
                                                @break

                                                @case(1)
                                                    <span class="badge text-bg-info">Late Present</span>
                                                @break

                                                @case(2)
                                                    <span class="badge text-bg-danger">Absent</span>
                                                @break

                                                @default
                                                    <span class="badge text-bg-secondary">Unknown</span>
                                            @endswitch

                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-dark text-decoration-none text-white">
                                            {{ $item->created_at ?? '' }}
                                            {{-- {{ Carbon::parse($item->created_at)->format('d F') }} --}}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="w-100 d-flex justify-content-center">
                                                <img src="{{ asset('not_found.png') }}" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            @endisset


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

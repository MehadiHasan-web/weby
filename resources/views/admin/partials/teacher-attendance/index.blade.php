@extends('admin.master.master')
@section('title')
    Attendance Teacher
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
                        <h4>Mark Attendance: Teachers </span></h4>
                    </div>


                    <div class="card-body">
                        {{-- items --}}
                        @isset($teacher)
                            @foreach ($teacher as $key => $item)
                                <div class="border rounded p-1  card position-relative mb-3" data-aos="fade-up">
                                    <h2 class="card-header">{{ $item->name ?? '' }}
                                    </h2>
                                    <div class="position-absolute top-0 end-0 pe-2 pt-2">
                                        <span class="badge text-bg-dark">{{ $item->created_at->diffForHumans() ?? '' }}</span>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button href="" type="button"
                                            class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModalPresent{{ $key }}"  >Present</button>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModallate_present{{ $key }}" type="button"
                                            class="btn btn-warning">Late Present</button>
                                        <a href="{{ route('teacher.absent', $item->id) }}" type="button"
                                            class="btn btn-danger">Absent</a>
                                    </div>
                                </div>

                                    <!-- Present Modal -->
                                <div class="modal fade" id="exampleModalPresent{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabelPresent" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabelPresent">Working Time</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('teacher.present', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input name="total_hour" type="number" class="form-control" placeholder="Workink time" min="0" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>

                                    <!-- Late Modal -->
                                <div class="modal fade" id="exampleModallate_present{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabellate_present" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabellate_present">Late present</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('teacher.late_present', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input name="total_hour" type="number" class="form-control" placeholder="Workink time" min="0" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
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

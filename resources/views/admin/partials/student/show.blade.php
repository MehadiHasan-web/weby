@extends('admin.master.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush
@section('title')
    Student Profile
@endsection
@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-10 col-md-12">
                    <div class="card user-card-full shadow">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="{{ $student->photo ? asset('storage/student/' . $student->photo ?? '') : 'https://img.icons8.com/bubbles/100/000000/user.png' }}"
                                            class="img-radius img-fluid" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600">{{ $student->name ?? '' }}</h6>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{ $student->email ?? 'Not Available' }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400">{{ $student->phone ?? 'Not Available' }}</h6>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Institute</p>
                                            <h6 class="text-muted f-w-400">{{ $student->institute_id ?? 'Not Available' }}
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Batch</p>
                                            <h6 class="text-muted f-w-400">{{ $student->batch_id ?? 'Not Available' }}</h6>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <h6 class="text-muted f-w-400">{{ $student->gender == 1 ? 'Mail' : 'Femail' }}
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Register Date</p>
                                            <h6 class="text-muted f-w-400">{{ $student->created_at->diffForHumans() ?? '' }}
                                            </h6>
                                        </div>
                                    </div>

                                    <a href="{{ route('student.index') }}" class="mt-3 btn btn-dark  shadow ">Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

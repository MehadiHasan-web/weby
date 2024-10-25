@extends('admin.master.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush
@section('title')
    Teacher Profile
@endsection
@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-10 col-md-12">
                    <div class="card user-card-full shadow">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="{{ $teacher->photo ? asset('storage/teacher/' . $teacher->photo ?? '') : 'https://img.icons8.com/bubbles/100/000000/user.png' }}"
                                            class="img-radius img-fluid" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600">{{ $teacher->name ?? '' }}</h6>
                                    <p>{{ $teacher->teacher_subject ?? 'Not Available' }}</p>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Degree</p>
                                            <h6 class="text-muted f-w-400">{{ $teacher->degree ?? 'Not Available' }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400">{{ $teacher->phone ?? 'Not Available' }}</h6>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Teacher Fee</p>
                                            <h6 class="text-muted f-w-400">{{ $teacher->teacher_fee ?? 'Not Available' }} Tk
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Education Institute</p>
                                            <h6 class="text-muted f-w-400">{{ $teacher->education_ins ?? 'Not Available' }}
                                            </h6>
                                        </div>
                                    </div>


                                    <a href="{{ route('teacher.index') }}" class="mt-3 btn btn-dark  shadow ">Back</a>
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                        class="mt-3 btn btn-dark  shadow ">Edit</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

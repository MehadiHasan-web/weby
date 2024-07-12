@php
    use App\Helpers\DateHelper;
@endphp
@extends('admin.master.master')
@section('title')
    Teacher
@endsection
@section('content')
    <div class=" mt-4 rounded shadow">

        <h2 class="text-center my-4 ">Teacher's Due Payment</h2>
        <table class="table table-hover ">
            <thead class="border bg-primary text-white">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Per Month's Fee</th>
                    <th scope="col">Number of Hour</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($teacher)
                    @forelse ($teacher as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->teacher->name ?? '' }}</td>
                            <td>{{ $item->hourly_rate ?? '' }} Tk</td>
                            <td colspan="2">
                                {{ DateHelper::teacherTotalHourOrAmount($item->teacher->teacher_time, $item->hourly_rate, $item->paid) }}
                            </td>

                            <td colspan="2">
                                <form action="{{ route('teacher.payment.paid', $item->teacher->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group w-75">
                                        <input name="fee" type="number" class="form-control" placeholder="Amount"
                                            value="{{ old('fee') }}">

                                        <div class="dropdown ms-2">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Add Note
                                            </button>
                                            <div class="dropdown-menu   border-0" style="width: 300px; background:none;">
                                                <div class="form-floating">
                                                    <textarea name="note" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                                        style="height: 200px">{{ old('note', $item->note ?? '') }}</textarea>
                                                    <label for="floatingTextarea">Comments</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary ms-2" type="submit">Submit</button>
                                    </div>
                                </form>
                                @error('fee')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


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
@endsection

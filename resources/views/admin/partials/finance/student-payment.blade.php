@php
    use App\Helpers\DateHelper;
@endphp
@extends('admin.master.master')
@section('title')
    Payment
@endsection
@section('content')
    <div class=" mt-4 rounded shadow">

        <h2 class="text-center my-4 ">Student's Due Payment</h2>
        <table class="table table-hover ">
            <thead class="border bg-primary text-white">
                <tr>
                    {{-- <th scope="col">SL</th> --}}
                    <th scope="col">Student Name</th>
                    <th scope="col">Per Month's Fee</th>
                    <th scope="col">Number of Months</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($student)
                    @forelse ($student as $key => $item)
                        @php
                            $amount = DateHelper::studentTotalMontOrhAmount($item->created_at, $item->fee, $item->id);
                        @endphp
                        <tr @if ($amount == 0) hidden @endif>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->fee ?? '' }} Tk</td>
                            <td>{{ DateHelper::studentTotalMontOrhAmount($item->created_at, $item->fee, $item->id) }}
                            </td>
                            <td colspan="2">
                                <form action="{{ route('student.payment', $item->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group w-75">
                                        <input name="paid" type="number" class="form-control" placeholder="Amount"
                                            value="{{ old('paid') }}">

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
                                @error('paid')
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

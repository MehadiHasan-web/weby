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
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Unpaid</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($teacher)
                    @forelse ($teacher as $key => $item)
                        @php
                            $data = DateHelper::teacherTotalHourOrAmount(
                                $item->teacher_fee,
                                $item->id,
                            );
                        @endphp
                        <tr @if ($data['amount'] == 0) hidden @endif>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->teacher_fee ?? '' }} Tk</td>
                            <td colspan="2">
                                {{-- {{ DateHelper::teacherTotalHourOrAmount($item->teacher_fee, $item->id) }} --}}
                                Hour {{ number_format($data['time'], 2)  }} and unpaid {{ $data['amount']  }}
                            </td>

                            <td colspan="2">
                                <form action="{{ route('teacher.payment.paid', $item->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group w-75">
                                        <input name="fee" type="number" class="form-control" placeholder="Amount"
                                            value="{{ old('fee') }}" min="0" max="{{ $data['amount'] ?? '' }}" required>

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
                                    <img class="img-fluid w-100" src="{{ asset('not_found.png') }}" alt="">
                                </div>
                            </td>
                        </tr>
                    @endforelse
                @endisset


            </tbody>
        </table>
    </div>
@endsection

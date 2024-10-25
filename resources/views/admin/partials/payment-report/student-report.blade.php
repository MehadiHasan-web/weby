@extends('admin.master.master')
@section('title')
    Payment report
@endsection
@section('content')
    <div class=" mt-4 rounded shadow" id="printarea">
        <h2 class="text-center my-4 ">Student's payment report</h2>
        <div>
            <a id="back" href="{{ route('student.index') }}" class="btn btn-outline-dark  ms-2 mb-2"><i
                    class="bi bi-arrow-return-left"></i></a>
            <button id="print" class="btn btn-outline-dark ms-2 mb-2"><i class="bi bi-printer-fill"></i></button>
        </div>

        <table class="table table-hover border">
            <thead class="border bg-primary text-white">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Note</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @isset($payment)
                    @foreach ($payment as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->student->name ?? '' }}</td>
                            <td>{{ $item->paid ?? '' }}</td>
                            <td>{{ $item->note ?? 'Not abaliable' }}</td>
                            <td>{{ $item->created_at ?? '' }}</td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
    <script>
        $("#print").click(function() {
            $(this).hide();
            $("#back").hide();

            setTimeout(function() {
                printJS({
                    printable: 'printarea',
                    type: 'html',
                    targetStyles: ['*']
                });

                $("#print").show();
                $("#back").show();
            }, 100);
        });
    </script>
@endpush

@extends('admin.master.master')
@section('title')
    Month report
@endsection
@section('content')

    <div class="d-flex mb-2 gap-2">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark"><i class="bi bi-arrow-return-left"></i></a>
        <button id="print" class="btn btn-outline-dark "><i class="bi bi-printer-fill"></i></button>
    </div>
    <div class="p-2 border" id="printarea">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Purpuse</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @isset($incomeOrExpanse_month)
                    @forelse ($incomeOrExpanse_month as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->note ?? 'Not abaliable' }}</td>
                            <td>{{ $item->total ?? '' }} Tk</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge text-bg-danger">Expanse</span>
                                @else
                                    <span class="badge text-bg-success">Income</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="w-100 d-flex justify-content-center">
                                    <img class="img-fluid" src="{{ asset('not_found.png') }}" alt="No found">
                                </div>
                            </td>
                        </tr>
                    @endforelse
                @endisset
            </tbody>

        </table>
    </div>


@endsection
@push('script')
    <script>
        function count(id) {
            console.log('Count function called with ID:', id);
            $(id).each(function() {
                var $this = $(this);
                console.log('Animating element with text:', $this.text());
                $({
                    Counter: 0
                }).animate({
                    Counter: $this.text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $this.text(Math.ceil(now));
                    }
                });
            });
        }

        count('#countIncome');
        count('#countExpense');
    </script>
    {{-- print  --}}
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

@extends('admin.master.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div>
        <h1>MONTHLY</h1>
        <h1>CASH BOX</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 position-relative">
            <div class="card bg-info text-white mb-4">
                <h3 class="card-body">Enter Income</h3>
                <div class="card-body">
                    <h2 class="countNumber"><span id="countIncome">{{ $totalIncome ?? '' }}</span> Tk</h2>
                </div>
            </div>
            <div class="position-absolute bottom-0 end-0 pe-5 pb-5">
                <button class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                        class="bi bi-plus"></i></button>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 position-relative">
            <div class="card bg-warning text-white mb-4">
                <h3 class="card-body text-dark">Enter Expense</h3>
                <div class="card-body">
                    <h2 class="text-dark countNumber"><span id="countExpense">{{ $totalExpanse ?? '' }}</span> Tk</h2>
                </div>
            </div>
            <div class="position-absolute bottom-0 end-0 pe-5 pb-5">
                <button class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#Expense"><i
                        class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="col-6 mb-4 pe-3">
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">See this
                month details</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>


    <!--income Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Income</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cash.income') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="income" class="form-label">Income</label>
                            <input name="income" type="number" class="form-control" id="income" placeholder="Tk"
                                required>
                            @error('income')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                            <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--expense Modal -->
    <div class="modal fade" id="Expense" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="Expense" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Expense">Enter Expense</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cash.expense') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="expense" class="form-label">Expense</label>
                            <input name="expense" type="number" class="form-control" id="expense" placeholder="Tk"
                                required>
                            @error('expense')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                            <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- income and expense month details  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">See this month details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printarea">

                    <div class="p-2 border">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Purpuse</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($incomeOrExpanse_this_month)
                                    @foreach ($incomeOrExpanse_this_month as $key => $item)
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
                                    @endforeach
                                    <th>
                                    <td></td>
                                    <td colspan="2" class="text-center">
                                        <strong class="me-4">Income: {{ $this_month_income ?? '' }} Tk</strong>
                                        <strong>Expanse: {{ $this_month_expanse ?? '' }} Tk</strong>
                                    </td>
                                    <td>

                                    </td>
                                    </th>
                                @endisset
                            </tbody>

                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="print" class="btn btn-outline-dark "><i class="bi bi-printer-fill"></i></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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

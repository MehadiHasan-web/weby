@extends('admin.master.master')
@section('title')
    Dashboard
@endsection
@section('content')

    <div>
        <h1 class="fw-bold text-primary">MONTHLY CASH BOX</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4  position-relative">
                <h3 class="card-body">Enter Income</h3>
                <div class="card-body">
                    <h2 class="countNumber"><span id="countIncome">{{ $totalIncome ?? '' }}</span> Tk</h2>
                </div>
                <div class="position-absolute bottom-0 end-0 pe-3 pb-3">
                    <button class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                            class="bi bi-plus"></i></button>
                </div>
            </div>

        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4  position-relative">
                <h3 class="card-body text-dark">Enter Expense</h3>
                <div class="card-body">
                    <h2 class="text-dark countNumber"><span id="countExpense">{{ $totalExpanse ?? '' }}</span> Tk</h2>
                </div>
                <div class="position-absolute bottom-0 end-0 pe-3 pb-3">
                    <button class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#Expense"><i
                            class="bi bi-plus"></i></button>
                </div>
            </div>
        </div>
        {{-- see month detales  --}}
        <div class="col-xl-6 col-md-6 position-relative">
            <div class=" mb-4 pe-3">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">See
                        This Month's Details</button>

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#seeAllMonth">See
                        All Financial  Report</button>
                </div>
            </div>
        </div>

    </div>


    {{-- CASH INFLOW --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4 shadow">
                <h1 class="card-header bg-primary text-white">
                    <i class="fas fa-chart-area me-1"></i>
                    CASH INFLOW
                </h1>
                <div class="card-body p-0">
                    <div class="d-flex p-1 border">
                        <div class="col-6 bg-info rounded">
                            <h2 class="text-white py-3 text-center">Student's Fee</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-3 text-center"><span>{{ $total_student_fee ?? '00' }}</span> Tk</h2>
                        </div>
                    </div>
                    <div class="d-flex p-1 border">
                        <div class="col-6 bg-info rounded">
                            <h2 class="text-white py-3 text-center">Others</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-3 text-center"><span>{{ $totalIncome ?? '00' }}</span> Tk</h2>
                        </div>
                    </div>
                    <div class="d-flex p-1 border  bg-success rounded">
                        <div class="col-6">
                            <h2 class="text-white py-1 text-center">Total</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-1 text-center text-white">
                                <span>{{ $total_student_fee + $totalIncome }}</span> Tk
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- cash outflow --}}
        <div class="col-xl-6">
            <div class="card mb-4 shadow">
                <h1 class="card-header bg-primary text-white">
                    <i class="fas fa-chart-area me-1"></i>
                    CASH OUTFLOW
                </h1>
                <div class="card-body p-0">
                    <div class="d-flex p-1 border">
                        <div class="col-6 bg-warning rounded">
                            <h2 class="text-white py-3 text-center">Teacher's Salary</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-3 text-center"><span>{{ $teacher_salary ?? '00' }}</span> Tk</h2>
                        </div>
                    </div>
                    <div class="d-flex p-1 border">
                        <div class="col-6 bg-warning rounded">
                            <h2 class="text-white py-3 text-center">Others</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-3 text-center"><span>{{ $totalExpanse ?? '00' }}</span> Tk</h2>
                        </div>
                    </div>
                    <div class="d-flex p-1 border  bg-danger rounded">
                        <div class="col-6">
                            <h2 class="text-white py-1 text-center">Total</h2>
                        </div>
                        <div class="col-6">
                            <h2 class="py-1 text-center text-white">
                                <span>{{ $teacher_salary + $totalExpanse }}</span> Tk
                            </h2>
                        </div>
                    </div>
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
        <div class="modal-dialog modal-dialog-centered modal-xl ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">See This Month's Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printarea">
                    <div class="p-2 border">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Purpose</th>
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
                                                    <span class="badge text-bg-danger">Expense</span>
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
                                        <strong>Expense: {{ $this_month_expanse ?? '' }} Tk</strong>
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

    {{-- income and expense month details  --}}
    <div class="modal fade" id="seeAllMonth" tabindex="-1" aria-labelledby="seeAllMonth" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 text-center font-bold text-success" id="seeAllMonth">LAST 12 MONTHS
                        FINANCIAL REPORTS OF INSTITUTE
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printarea">
                    <div class="row row-cols-2 ">
                        {{-- month 1 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 1]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">January
                                2024
                            </a>
                        </div>
                        {{-- month 2 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 2]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">February
                                2024
                            </a>
                        </div>
                        {{-- month 3 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 3]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">March
                                2024
                            </a>
                        </div>
                        {{-- month 4 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 4]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">April
                                2024
                            </a>
                        </div>
                        {{-- month 5 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 5]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">May
                                2024
                            </a>
                        </div>
                        {{-- month 6 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 6]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">June
                                2024
                            </a>
                        </div>
                        {{-- month 7 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 7]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">July
                                2024
                            </a>
                        </div>
                        {{-- month 8 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 8]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">August
                                2024
                            </a>
                        </div>
                        {{-- month 3 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 9]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">Septemper
                                2024
                            </a>
                        </div>
                        {{-- month 10 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 10]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">October
                                2024
                            </a>
                        </div>
                        {{-- month 11 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 11]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">November
                                2024
                            </a>
                        </div>
                        {{-- month 12 --}}
                        <div class="col">
                            <a href="{{ route('financial.month.report', ['month' => 12]) }}"
                                class="text-white w-100 text-decoration-none fw-bold fs-2 btn btn-primary mb-2">December
                                2024
                            </a>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
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

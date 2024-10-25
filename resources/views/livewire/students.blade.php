<div>
    <a href="{{ route('student.create') }}" class="my-2 btn btn-outline-dark  btn-sm">New Student</a>
    <table class="table  table-hover border rounded shadow  ">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th class="d-none d-sm-table-cell"  scope="col">Phone</th>
                <th scope="col">Fee</th>
                <th class="d-none d-sm-table-cell" scope="col">Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $key => $item)
                    <tr class="">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="d-flex justify-items-center">
                            <a class="d-none d-sm-table-cell"  href="{{ route('student.show', $item->id) }}">
                                <img class="img-fluid img-fluid me-2 rounded shadow"
                                    src="{{ URL::to('storage/student/' . $item->photo ?? '') }}" alt=""
                                    style="width:50px; height:50px; ">
                            </a>

                            <div>
                                <strong class="font-bold ">
                                    <a class="" href="{{ route('student.show', $item->id) }}">
                                        {{ $item->name ?? 'Not Available' }}</a>
                                </strong>
                                <p class="text-black" style="font-size: 12px;"> {{ $item->email ?? 'Not Available' }}</p>
                            </div>
                        </td>
                        <td class="d-none d-sm-table-cell" >
                            <strong>{{ $item->phone ?? 'Not Available' }}</strong>
                            <p class="text-muted">{{ $item->created_at->diffForHumans() ?? '' }}</p>
                        </td>
                        <td >
                            <p>{{ $item->fee ?? '' }}Tk</p>
                        </td>
                        <td class="d-none d-sm-table-cell" >
                            <span class="">{{ $item->gender == 1 ? 'Male' : 'Female' }}</span>
                        </td>
                        <td>
                            <a  class="btn btn-info btn-sm mb-1 mb-sm-0 " href="{{ route('student.edit', $item->id) }}"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('student.payment.report', $item->id) }}"
                                class="btn btn-success btn-sm">Report</a>
                        </td>

                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
</div>

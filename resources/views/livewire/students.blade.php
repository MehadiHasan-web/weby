<div>
    <a href="{{ route('student.create') }}" class="my-2 btn btn-outline-dark">New Student</a>
    <table class="table  table-hover border rounded shadow">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Fee</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="d-flex justify-items-center">
                            <a href="{{ route('student.show', $item->id) }}">
                                <img class="img-fluid img-fluid me-2 rounded shadow"
                                    src="{{ URL::to('storage/student/' . $item->photo ?? '') }}" alt=""
                                    style="width:50px; height:50px; ">
                            </a>

                            <div>
                                <strong class="font-bold ">
                                    <a class="" href="{{ route('student.show', $item->id) }}">
                                        {{ $item->name ?? 'Not Available' }}</a>
                                </strong>
                                <p class="text-black"> {{ $item->email ?? 'Not Available' }}</p>
                            </div>
                        </td>
                        <td>
                            <strong>{{ $item->phone ?? 'Not Available' }}</strong>
                            <p class="text-muted">{{ $item->created_at->diffForHumans() ?? '' }}</p>
                        </td>
                        <td>
                            <p>{{ $item->fee ?? '' }}Tk</p>
                        </td>
                        <td>
                            <span class="">{{ $item->gender == 1 ? 'Mail' : 'Femail' }}</span>
                        </td>
                        <td>
                            <a  class="btn btn-info btn-sm " href="{{ route('student.edit', $item->id) }}"><i
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

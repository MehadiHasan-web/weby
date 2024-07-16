<div>
    <a href="{{ route('student.create') }}" class="my-2 btn btn-outline-dark">New</a>
    <table class="table  table-hover border rounded shadow">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Fee</th>
                <th scope="col">Gender</th>
                <th scope="col">Profile</th>
                <th scope="col">Report</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <p>{{ $item->name ?? 'Not Available' }}</p>
                            <p> {{ $item->email ?? 'Not Available' }}</p>
                        </td>
                        <td>
                            <p>{{ $item->phone ?? 'Not Available' }}</p>
                            <p>{{ $item->created_at->diffForHumans() ?? '' }}</p>
                        </td>
                        <td>
                            <p>{{ $item->fee ?? '' }}Tk</p>
                        </td>
                        <td>
                            <p>{{ $item->gender == 1 ? 'Mail' : 'Femail' }}</p>
                        </td>
                        <td>
                            <a href="{{ route('student.profile', $item->id) }}" class="btn btn-info me-2 btn-sm">Profile
                                <i class="bi bi-person-lines-fill ms-2"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('student.payment.report', $item->id) }}" class="btn btn-success">Report</a>
                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
</div>

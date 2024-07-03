<div>
    <table class="table  table-hover border rounded shadow">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Institute Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Date</th>
                <th>Approved</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $item)
                    <tr>
                        <th scope="row">{{ $item->id ?? '' }}</th>
                        <th scope="row">{{ $item->institute_id ?? '' }}</th>
                        <td>{{ $item->name ?? 'Not Available' }}</td>
                        <td>{{ $item->email ?? 'Not Available' }}</td>
                        <td>{{ $item->phone ?? 'Not Available' }}</td>
                        <td>{{ $item->gender == 1 ? 'Mail' : 'Femail' }}</td>
                        <td>{{ $item->created_at->diffForHumans() ?? '' }}</td>
                        <td>
                            <div class="d-flex justify-center">
                                <form wire:submit.prevent="approved({{ $item->id }})">
                                    <button type="submit" class="btn btn-success me-2 btn-sm">
                                        <i class="bi bi-check2-circle"></i> Approved
                                    </button>
                                </form>
                                <button type="button" class="btn btn-danger me-2 btn-sm">
                                    <i class="bi bi-x-lg"></i> Declient
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
</div>

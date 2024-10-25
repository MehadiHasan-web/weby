@extends('admin.master.master')
@section('title')
    Institutes
@endsection
@section('content')
    <table class="table  table-hover border rounded shadow">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Approved</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institutes as $item)
                <tr>
                    <th scope="row">{{ $item->id ?? '' }}</th>
                    <td>{{ $item->name ?? 'Not Available' }}</td>
                    <td>{{ $item->phone ?? 'Not Available' }}</td>
                    <td>{{ $item->created_at->diffForHumans() ?? '' }}</td>
                    <td>
                        <div>
                            @if ($item->status == 0)
                                <a href="{{ route('institute.pending', $item->id) }}" type="button"
                                    class="btn btn-danger me-2 btn-sm">
                                    Not Approved <i class="bi bi-x-lg"></i>
                                </a>
                            @else
                                <a href="{{ route('institute.approval', $item->id) }}" type="button"
                                    class="btn btn-success me-2 btn-sm">
                                    <i class="bi bi-check2-circle"></i> Approved
                                </a>
                            @endif
                        </div>

                    </td>
                    <td>
                        <div class="flex">
                            <button type="submit" class="btn btn-danger btn-sm delate-item-btn"
                                data-delate-route="{{ route('institute.destroy', $item->id) }}"><i
                                    class="bi bi-trash3"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

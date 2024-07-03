@extends('admin.master.master')
@section('title')
    Batchs
@endsection
@section('content')
    <table class="table  table-hover border rounded shadow">
        <div class="d-flex justify-content-end">
            <a href="{{ route('batch.create') }}" class="btn btn-dark rounded shadow mb-2 btn-sm"> Add
                Batch<i class="bi bi-plus-circle-dotted ms-2"></i></a>
        </div>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Batch Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($batch)
                @foreach ($batch as $item)
                    <tr>
                        <th scope="row">{{ $item->id ?? '' }}</th>
                        <td>{{ $item->name ?? '' }}</td>
                        <td>{{ $item->created_at->diffForHumans() ?? '' }}</td>
                        <td>
                            <div class="">
                                <a type="submit" class="btn btn-warning btn-sm " href="{{ route('batch.show', $item->id) }}"><i
                                        class="bi bi-eye"></i></a>
                                <a type="submit" class="btn btn-info btn-sm " href="{{ route('batch.edit', $item->id) }}"><i
                                        class="bi bi-pencil-square"></i></a>

                                <button type="submit" class="btn btn-danger btn-sm delate-item-btn"
                                    data-delate-route="{{ route('batch.destroy', $item->id) }}"><i
                                        class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
@endsection

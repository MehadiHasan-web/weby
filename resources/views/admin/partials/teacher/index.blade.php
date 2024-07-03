@extends('admin.master.master')
@section('title')
    Teachers
@endsection
@section('content')
    <table class="table  table-hover border rounded shadow">
        <div class="d-flex justify-content-end">
            <a href="{{ route('teacher.create') }}" class="btn btn-dark rounded shadow mb-2 btn-sm"> Add
                Teacher<i class="bi bi-plus-circle-dotted ms-2"></i></a>
        </div>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Phone</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($teachers)
                @foreach ($teachers as $item)
                    <tr>
                        <th scope="row">{{ $item->id ?? '' }}</th>
                        <td><img class="img-fluid img-fluid" src="{{ URL::to('storage/teacher/' . $item->photo ?? '') }}"
                                alt="" style="width:38px; height:38px; ">
                            {{ $item->name ?? '' }}</td>
                        <td>{{ $item->teacher_subject ?? '' }}</td>
                        <td>{{ $item->phone ?? '' }}</td>
                        <td>{{ $item->teacher_time ?? '' }}</td>
                        <td>{{ $item->created_at->diffForHumans() ?? '' }}</td>
                        <td>
                            <div class="">
                                <a type="submit" class="btn btn-warning btn-sm "
                                    href="{{ route('teacher.show', $item->id) }}"><i class="bi bi-eye"></i></a>
                                <a type="submit" class="btn btn-info btn-sm " href="{{ route('teacher.edit', $item->id) }}"><i
                                        class="bi bi-pencil-square"></i></a>

                                <button type="submit" class="btn btn-danger btn-sm delate-item-btn"
                                    data-delate-route="{{ route('teacher.destroy', $item->id) }}"><i
                                        class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
@endsection

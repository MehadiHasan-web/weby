@extends('admin.master.master')
@section('title')
    Exams
@endsection
@section('content')
    <table class="table  table-hover border rounded shadow">
        <div class="d-flex justify-content-end">
            <a href="{{ route('exam.create') }}" class="btn btn-dark rounded shadow mb-2 btn-sm"> Add
                Exam<i class="bi bi-plus-circle-dotted ms-2"></i></a>
        </div>
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($exam)
                @foreach ($exam as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->exam_topic ?? '' }}</td>
                        <td>{{ $item->created_at->diffForHumans() ?? '' }}</td>
                        <td>
                            <div class="">
                                <a type="submit" class="btn btn-warning btn-sm " href="{{ route('exam.show', $item->id) }}"><i
                                        class="bi bi-eye"></i></a>
                                <a type="submit" class="btn btn-info btn-sm " href="{{ route('exam.edit', $item->id) }}"><i
                                        class="bi bi-pencil-square"></i></a>

                                <button type="submit" class="btn btn-danger btn-sm delate-item-btn"
                                    data-delate-route="{{ route('exam.destroy', $item->id) }}"><i
                                        class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
@endsection

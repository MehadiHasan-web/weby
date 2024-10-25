<div>
    <table class="table  table-hover border rounded shadow">
        <div class="d-flex justify-content-start">
            <select wire:model.live="batch_id" class="form-select form-select-sm mb-2 " aria-label="Small select example "
                style="width: 150px">
                <option selected value="all">All</option>
                @isset($batch)
                    @foreach ($batch as $item)
                        <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                    @endforeach
                @endisset
            </select>
            <a href="{{ route('exam.create') }}" class="btn btn-dark rounded shadow mb-2 ms-2"> Add
                Exam<i class="bi bi-plus-circle-dotted ms-2"></i></a>
        </div>
        <thead>
            <tr>
                <th  class="d-none d-sm-table-cell" scope="col">SL</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Exam topic</th>
                <th class="d-none d-sm-table-cell" scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($exam)
                @forelse ($exam as $key => $item)
                    <tr>
                        <th class="d-none d-sm-table-cell" scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->name ?? '' }}</td>
                        <td>{{ $item->exam_topic ?? '' }}</td>
                        <td  class="d-none d-sm-table-cell">{{ $item->created_at->diffForHumans() ?? '' }}</td>
                        <td>
                            <div class="">
                                <a type="submit" class="btn btn-warning btn-sm "
                                    href="{{ route('exam.show', $item->id) }}"><i class="bi bi-eye"></i></a>
                                <a type="submit" class="btn btn-info btn-sm " href="{{ route('exam.edit', $item->id) }}"><i
                                        class="bi bi-pencil-square"></i></a>

                                <button type="submit" class="btn btn-danger btn-sm delate-item-btn"
                                    data-delate-route="{{ route('exam.destroy', $item->id) }}"><i
                                        class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('not_found.png') }}" alt="">
                            </div>
                        </td>
                    </tr>
                @endforelse
            @endisset


        </tbody>
    </table>
</div>

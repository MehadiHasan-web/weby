<div class="d-flex justify-content-center">
    <div class="col-12 col-md-8 shadow border py-4 rounded">
        <div class="text-center">
            <h2>Student Attendance Report</h2>
            <h2 class="text-muted">Batch: 2023-2024</h2>
            <div class="d-flex justify-content-center my-3">
                <form action="" class="row row-cols-1 row-cols-md-3 gap-2 gap-sm-0 px-2 px-sm-0 " wire:submit="attendance">
                    <div class="col">
                        <select wire:model="batch_id" class="form-select " aria-label="Default select example" >
                            <option selected>Select Batch</option>
                            @isset($batch)
                                @foreach ($batch as $item)
                                    <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('batch_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input wire:model="date" type="date" class="form-control " placeholder="Select date" >
                        @error('date')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-outline-dark w-100 ">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        {{-- table  --}}
        <div class="p-3">
            <table class="table border rounded table-hover">
                <thead>
                    <tr>
                        <th scope="col">Roll No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Report</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($attendances)
                        @forelse ($attendances as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><a
                                        href="{{ route('student.show', $item->student->id) }}">{{ $item->student->name ?? '' }}</a>
                                </td>
                                <td>
                                    <div class="d-flex ">
                                        @switch($item->is_present)
                                            @case(0)
                                                <span class="badge text-bg-primary">Present</span>
                                            @break

                                            @case(1)
                                                <span class="badge text-bg-info">Late Present</span>
                                            @break

                                            @case(2)
                                                <span class="badge text-bg-danger">Absent</span>
                                            @break

                                            @default
                                                <span class="badge text-bg-secondary">Unknown</span>
                                        @endswitch

                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('student.attendance', $item->student->id) }}"
                                        class="badge text-bg-dark text-decoration-none text-white">
                                        Report
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="w-100 d-flex justify-content-center">
                                            <img src="{{ asset('not_found.png') }}" alt="">
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        @endisset


                    </tbody>
                </table>
            </div>
        </div>
    </div>

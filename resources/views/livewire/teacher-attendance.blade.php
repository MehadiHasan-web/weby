<div class="d-flex justify-content-center">
    <div class="col-8 shadow border py-4 rounded">
        <div class="text-center">
            <h2>Teacher Attendance Report</h2>
            <div class="d-flex justify-content-center my-3">
                <form action="" class="d-flex" wire:submit="attendance">
                    <div>
                        <input wire:model="date" type="date" class="form-control ms-2" style="width: 300px;">
                        @error('date')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-dark ms-2">Submit</button>
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
                    </tr>
                </thead>
                <tbody>
                    @isset($attendances)
                        @forelse ($attendances as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><a
                                        href="{{ route('teacher.show', $item->teacher->id) }}">{{ $item->teacher->name ?? '' }}</a>
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

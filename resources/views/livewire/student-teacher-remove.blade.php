<div>

    <div>
        <h2>Teachers @isset($batch->teacher)
                <span class="badge badge-pill text-bg-info fs-5"> {{ $batch->teacher->count() }}</span>
            @endisset
        </h2>
        <div class="d-flex gap-2">
            @isset($batch->teacher)
                @forelse ($batch->teacher as $item)
                   <div class="d-flex badge badge-pill text-bg-primary text-white">
                        <a href="{{ route('teacher.show', $item->id) }}"
                        class=" fs-5 text-white me-1">{{ $item->name ?? '' }}</a>
                        <a   onclick="return confirmRemoval(this)" href="{{ route('batch.teacher.remove', ['id' => $item->id, 'batch_id' => $batch->id]) }}"  class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                   </div>

                @empty
                    <p>No teacher added.</p>
                @endforelse
            @endisset
        </div>
    </div>

    {{-- students  --}}
    <h4 class="mt-4">Students @isset($batch->student)
            <span class="badge badge-pill text-bg-success fs-5"> {{ $batch->student->count() }}</span>
        @endisset
    </h4>
    <div class="me-lg-3 border p-1 ">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batch->student as $key => $item)
                    <tr wire:key="student-{{ $item->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="font-bold"><a class="text-bold"
                                href="{{ route('student.show', $item->id) }}">{{ $item->name ?? '' }}</a></td>
                        <td>
                            <a   onclick="return confirmRemoval(this)" href="{{ route('batch.student.remove', ['id' => $item->id, 'batch_id' => $batch->id]) }}"  class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    @push('script')
    <script>
        function confirmRemoval(link) {
            // Prevent the default action of the link
            event.preventDefault();

            // Show SweetAlert2 confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to remove this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, navigate to the URL
                    window.location.href = link.href;
                }
            });

            // Return false to prevent default link action
            return false;
        }
    </script>
    @endpush


</div>

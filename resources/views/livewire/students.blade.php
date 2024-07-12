<div>
    <table class="table  table-hover border rounded shadow">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Institute Id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th>Approved</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <th scope="row">{{ $item->institute_id ?? '' }}</th>
                        <td>
                            <p>{{ $item->name ?? 'Not Available' }}</p>
                            <p> {{ $item->email ?? 'Not Available' }}</p>
                        </td>
                        <td>
                            <p>{{ $item->phone ?? 'Not Available' }}</p>
                            <p>{{ $item->created_at->diffForHumans() ?? '' }}</p>
                        </td>
                        <td>
                            <p>{{ $item->gender == 1 ? 'Mail' : 'Femail' }}</p>
                            <a href="{{ route('student.profile', $item->id) }}" class="btn btn-info me-2 btn-sm">Profile
                                <i class="bi bi-person-lines-fill ms-2"></i></a>
                        </td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <form wire:submit.prevent="approved({{ $item->id }})" class="d-flex">
                                    <div class="input-group " style="width: 130px;">
                                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">Default</span> --}}
                                        <input wire:model="fee" type="text" class="form-control me-2"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            placeholder="Monthly Fee">
                                    </div>
                                    <button type="submit" class="btn btn-success me-2 btn-sm">
                                        <i class="bi bi-check2-circle"></i> Approved
                                    </button>
                                </form>
                                <button type="button" class="btn btn-danger me-2 btn-sm">
                                    <i class="bi bi-x-lg"></i> Declient
                                </button>
                            </div>
                            @error('fee')
                                <p class="error text-danger">{{ $message }}</p>
                            @enderror

                        </td>
                    </tr>
                @endforeach
            @endisset


        </tbody>
    </table>
</div>

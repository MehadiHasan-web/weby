{{-- <div>
    @isset($batch->student)
        @foreach ($batch->student as $key => $item)
            <div class="d-flex justify-content-between  p-2 rounded border  mb-2">
                <strong class="col me-2">{{ $key + 1 }}.
                    {{ $item->name ?? '' }}</strong>
                <div class="d-flex justify-items-center ">
                    <form class="input-group input-group-sm" action="{{ route('result.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input name="student_id" type="number" class="form-control w-50 hidden" value="{{ $item->id ?? '' }}"
                            hidden>
                        <input name="exam_id" type="number" class="form-control w-50 hidden" value="{{ $exam->id ?? '' }}"
                            hidden>
                        <input name="marks" type="number" class="form-control w-50" placeholder="Marks">
                        <button class="btn btn-outline-success" type="submit">Submit</button>
                        <a href="{{ route('result.absent', [$item->id, $exam->id]) }}" class="btn btn-outline-danger"
                            type="button">Absent</a>
                    </form>

                    <div class="mb-3 d-none">
                        <label for="marks-{{ $item->id }}">
                            Marks for {{ $item->name }} || {{ $marks[$item->id] ?? 'N/A' }}
                        </label>
                        <input id="marks-{{ $item->id }}" name="marks" type="number" class="form-control w-50"
                            wire:model.debounce.500ms="marks.{{ $item->id }}" placeholder="Marks">
                    </div>


                </div>
            </div>
        @endforeach
    @endisset
</div> --}}
<div>
    <form wire:submit.prevent="saveResults">
        @foreach ($batch->student as $key => $student)
            <div class="mb-1 border p-2 d-flex justify-content-between">
                <label for="student_{{ $student->id }}" class="fs-bold">  <span class="badge text-bg-info"> {{ $key + 1}}</span> <span class="badge text-bg-dark"> {{ $student->name }}</span></label>
                <input class="" type="number" wire:model.defer="results.{{ $student->id }}.marks" placeholder="Enter marks for {{ $student->name }}" required>
            </div>
        @endforeach
        <button class="btn btn-sm btn-outline-dark" type="submit">Submit Results</button>
    </form>

</div>

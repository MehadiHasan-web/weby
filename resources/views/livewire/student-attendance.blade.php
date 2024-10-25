<div>
    @isset($batch->student)
        @foreach ($batch->student as $item)
            @php
                $attendance = $this->today_attend->get($item->id);

            @endphp

            <div class="border rounded p-1  card position-relative mb-3">
                <h2 class="card-header">{{ $item->name ?? '' }} </h2>
                <div class="position-absolute top-0 end-0 pe-2 pt-2">
                    <span class="badge text-bg-dark">{{ $item->created_at->diffForHumans() ?? '' }}</span>
                </div>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button wire:click="present({{ $item->id }}, {{ $batch->id }})" type="button"
                        class="btn fw-bold   {{ $attendance && $attendance->is_present === '0' ? 'btn-success' : 'btn-outline-success' }}"  >Present</button>
                    <button wire:click="late_present({{ $item->id }}, {{ $batch->id }})" type="button"
                        class="btn  text-dark fw-bold {{ $attendance && $attendance->is_present === '1' ? 'btn-warning' : 'btn-outline-warning' }}">Late
                        Present</button>
                    <button wire:click="absent({{ $item->id }}, {{ $batch->id }})" type="button"
                        class="btn  fw-bold {{ $attendance && $attendance->is_present === '2' ? 'btn-danger' : 'btn-outline-danger' }}">Absent</button>
                </div>
            </div>


        @endforeach
    @endisset


</div>

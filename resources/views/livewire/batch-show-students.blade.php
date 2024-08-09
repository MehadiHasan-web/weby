<div>
@isset($batch->student)
    @foreach ($batch->student as $key => $item)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td class="font-bold"><a class="text-bold"
                    href="{{ route('student.show', $item->id) }}">{{ $item->name ?? '' }}</a></td>
            <td>
                <button  class="btn btn-danger btn-sm">Remove</button>
                <button wire:click="test_method" class="btn btn-primary">Test Method</button>
                <h1>{{ $count }}</h1>

                <button wire:click="increment">+</button>
            </td>
        </tr>
        {{-- @endif --}}
    @endforeach
@endisset
</div>

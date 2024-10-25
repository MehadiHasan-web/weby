<div>
    <form wire:submit.prevent="search_notify" class="d-flex" >
        <input class="form-control" type="number" wire:model="phone" style="width:200px" placeholder="write your number">

        <button class="ms-2 btn btn-primary" type="submit">Save</button>
    </form>

    @isset($notice)
       @foreach ($notice as $item)
        <div class="status-bar bg-info text-white">
            <strong>Notice:</strong>{{ $item->notice ?? '' }}
        </div>
       @endforeach
    @endisset

</div>

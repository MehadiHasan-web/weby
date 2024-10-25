<div>
            {{-- body --}}
            <div class="modal-body">
                <div class="card" id="chat4">
                    <div class="card-body" data-mdb-perfect-scrollbar-init >

                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                            <div>
                              @isset($notes)
                                  @foreach ($notes as $item)
                                   <div class="d-flex justify-content-end">
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info {{ $item->status == 1 ? 'text-decoration-line-through' : '' }}">{{ $item->notes ?? '' }}</p>
                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center pt-4" style="height: 30px">
                                            <div class="form-check ">
                                                <input wire:click="updateNotebookStatus({{ $item->status }}, {{ $item->id }})" class="form-check-input" type="checkbox"  id="flexCheckDefault" {{ $item->status == 1 ? 'checked' : '' }}>
                                                {{-- <label class="form-check-label" for="flexCheckDefault">
                                                  Done
                                                </label> --}}
                                            </div>
                                            <button  wire:click="delete({{ $item->id }})" wire:confirm="Are you sure you want to delete this note?" class="btn btn-sm btn-outline-danger"><i class="bi bi-x-circle-fill"></i></button>
                                        </div>
                                   </div>
                                  @endforeach
                              @endisset
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <form wire:submit.prevent="save_note" class=" text-muted d-flex justify-content-start align-items-center p-3">
                    <textarea wire:model="text" id="" cols="50" rows="1" class="form-control form-control-lg" id="exampleFormControlInput3"
                    placeholder="Type message" required></textarea>
                    <button class="ms-3 btn" type="submit"><i class="bi bi-floppy"></i></button>
                </form>

            </div>
</div>

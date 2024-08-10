<div>
    <div class="modal-header d-flex justify-content-between">

        <div class="modal-title fs-5  d-flex justify-content-between" id="whatsappLabel">
            <h1 class="fs-5" >Whatsapp</h1>
            <select wire:model.live='batch_id' class="form-select form-select-sm ms-1" aria-label="Default select example">
                <option selected value="all">Select Batch</option>
               @isset($batch)
                   @foreach ($batch as $item)
                       <option value="{{ $item->id }}">{{ $item->name }}</option>
                   @endforeach
               @endisset
            </select>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <div class="card" id="chat4">
            <div class="card-body" data-mdb-perfect-scrollbar-init
              style="position: relative; height: 400px">



              <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                <div>
                  @isset($message)
                      @foreach ($message as $item)
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">{{ $item->message ?? '' }}</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">{{ $item->created_at }}</p>
                      @endforeach
                  @endisset
                </div>

              </div>

            </div>
        </div>

    </div>

    <div class="modal-footer">
        <form wire:submit.prevent="whatsapp" class=" text-muted d-flex justify-content-start align-items-center p-3">

            <textarea wire:model="text" id="" cols="50" rows="2" class="form-control form-control-lg" id="exampleFormControlInput3"
            placeholder="Type message" required></textarea>
            <button class="ms-3 btn" type="submit"><i class="fas fa-paper-plane"></i></button>
        </form>

    </div>

    {{-- <form action="{{ route('send.whatsapp') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Send Message</button>
    </form> --}}





</div>

<div>
    <div class="row row-cols-2 ">
        @isset($exam->exam_paper)
            @foreach (json_decode($exam->exam_paper) as $image)
                <div class=" rounded position-relative">
                    <img src="{{ URL::to('storage/question/' . $image ?? '') }}" class="d-block img-fluid rounded mb-4"
                        alt="...">
                    <button wire:click="deleteImage('{{ $image }}')"
                        class="btn btn-danger position-absolute top-0 end-0 " style="margin-top: -10px"><i
                            class="bi bi-trash3-fill"></i></button>
                </div>
            @endforeach
        @endisset
    </div>
</div>

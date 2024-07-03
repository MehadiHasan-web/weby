@extends('admin.master.master')
@section('title')
    Batchs show
@endsection
@section('content')
    <div class="col-6 card p-4">
        <h6>Batch Id : {{ $batch->id ?? '' }}</h6>
        <h4 class="card-title"> Batch name: <span class="text-info">{{ $batch->name ?? '' }}</span></h4>
        <h6>Date :<span class="ms-3 text-muted">{{ $batch->created_at->diffForHumans() ?? '' }}</span></h6>


        <div class="mt-3">
            <a type="submit" class="btn btn-dark btn-sm " href="{{ route('batch.index', $batch->id) }}"><i
                    class="bi bi-arrow-return-left"></i></a>
            <a type="submit" class="btn btn-warning btn-sm " href="{{ route('batch.show', $batch->id) }}"><i
                    class="bi bi-eye"></i></a>
            <a type="submit" class="btn btn-info btn-sm " href="{{ route('batch.edit', $batch->id) }}"><i
                    class="bi bi-pencil-square"></i></a>
        </div>
    </div>
    <div class="pt-4 pe-4">
        {{-- <div class="row d-none">
            @isset($batch->routine)
                @foreach (json_decode($batch->routine) as $image)
                    <img src="{{ URL::to('storage/routine/' . $image ?? '') }}" alt=""
                        class="img-fluid rounded ml-1 mr-1 mb-2">
                @endforeach
            @endisset
        </div> --}}


        <div id="carouselExample" class="carousel slide col-9">
            <div class="carousel-inner">
                @isset($batch->routine)
                    @foreach (json_decode($batch->routine) as $image)
                        <div class="carousel-item active rounded">
                            <img src="{{ URL::to('storage/routine/' . $image ?? '') }}" class="d-block img-fluid rounded"
                                alt="...">
                        </div>
                    @endforeach
                @endisset
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>
@endsection

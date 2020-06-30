@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ $data["imgRecipe"] }}" class="img-fluid card-img-top img-thumbnail">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="card-title font-weight-bold">{{ $data["titleRecipe"] }}</h5>
                    <button type="button" class="btn btn-success rounded-pill mb-4 disabled">
                            {{ $data["localRecipe"] }}
                            <span class="badge badge-pill badge-light ml-2">
                                {{ $data["categoryRecipe"] }}
                            </span>
                    </button>
                    <p class="card-text">{{ $data["instructionRecipe"] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

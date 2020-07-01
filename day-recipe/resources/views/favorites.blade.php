@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card">
        <ul class="list-group list-group-flush">
            @for ($i=0; $i < $numFavorites; $i++)
                <li class="list-group-item">
                    <div class="card mb-3" style="max-width: 780px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $data[$i]['imgRecipe'] }}" class="card-img img-fluid img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data[$i]['titleRecipe'] }}</h5>
                                    <p class="card-text">{{ $data[$i]['instructionRecipe'] }}</p>
                                <p class="card-text"><small class="text-muted">{{ $data[$i]['localRecipe'] }} {{ $data[$i]['categoryRecipe'] }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
</div>
@endsection

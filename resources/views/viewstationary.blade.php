@extends('layouts.app')
@section('content')

<div class="center">
    <div class="row col-60 center stationary mb-20 p-20">
        <div class="center col-30 mb-20 mt-20 mr-20">
            <img class="col-100" src="/storage/uploads/stationary/{{$stationaries->image}}">
        </div>
        <div class="col-80 column s-desc mb-10 mt-20 bold">
            <div>
                Stationary Name: {{$stationaries->name}}
            </div>
            <div>
                Stationary Price: {{$stationaries->price}}
            </div>
            <div>
                Stationary Stock: {{$stationaries->stock}}
            </div>
            <div>
                Stationary Type: {{$types->name}}
            </div>
            <div>
                Description: {{$stationaries->description}}
            </div>
            @if(Auth::check())
                @if(Auth::user()->is_admin)
                <div class="row mt-20 nav">
                    <form class="row" action="{{ route('deletestationary') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button class="btn-search f-20 delete mr-20" type="submit" name="delete" value="{{$stationaries->id}}">Delete</button>
                    </form>
                    <a class="btn-search f-20 mr-20" href="{{route('editstationary', $stationaries->id)}}">Edit</a>
                </div>
                @else
                <div class="row mt-20 nav">
                    <form class="row" action="{{ route('deletestationary') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="col-100 f-20 f-add mr-20 cart" type="number" name="price" placeholder="Quantity" required>
                        <button class="btn-search f-20 mr-20 b-cart" type="submit" name="delete" value="{{$stationaries->id}}">Add to Cart</button>
                    </form>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>

@if (session('status'))
<div class=" alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endsection
@extends('layouts.app')
@section('content')

<div class="center">
    <div class="col-60">
        <form action="{{ route('poststationary') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="image" class="f-add mb-10">
                <div class="row bold f-15">
                    <div class="mr-20">
                        Browse Photos
                    </div>
                    <input type="file" name="image" onchange="loadimage()" required>
                </div>
            </div>
            <div>
                <div>
                    <input class=" col-100 f-add mb-10" type="text" name="name" placeholder="Enter Name" required>
                </div>
                @error('name')
                <div class="row pb-20">
                    <div class="col-100 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <div>
                    <input class="col-100 f-add mb-10" type="text" name="description" placeholder="Description" required>
                </div>
                @error('description')
                <div class="row pb-20">
                    <div class="col-100 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <div class="row center">
                    <div class=" f-add mb-10 t-types">
                        Types
                    </div>
                    <select class="col-100 f-add mb-10" id="type" name="type">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input class="col-100 f-add mb-10" type="number" name="stock" placeholder="Stock" required>
                </div>
                @error('stock')
                <div class="row pb-20">
                    <div class="col-100 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <div>
                    <input class="col-100 f-add mb-10" type="number" name="price" placeholder="Price" required>
                </div>
                @error('price')
                <div class="row pb-20">
                    <div class="col-100 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <button class="btn-search" type="submit" name="submit">Add New Stationary</button>
            </div>
        </form>
    </div>
</div>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endsection
@extends('layouts.app')
@section('content')

<div class="center">
    <div class="col-60">
        <form action="{{ route('updatestationary') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <button class="btn-search mr-20" type="submit" name="update" value="{{$id}}">Update Stationary Data</button>
            </div>
        </form>
    </div>
</div>
</form>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endsection
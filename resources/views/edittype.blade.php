@extends('layouts.app')
@section('content')

<div class="center">
    <div class=" row col-60">
        <div class="mr-20 col-100">
            <div class="">
                <table class="bold f-20 col-100">
                    <thead>
                        <th>Number</th>
                        <th>Stationary Type Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                        $x=1;
                        @endphp
                        @foreach ($types as $type)
                        <tr>
                            <td>{{$x + 10 * ($types->currentPage()-1)}}</td>
                            <td>{{$type->name}}</td>
                            <td class="row">
                                <form class="row col-100" action="{{ route('updatetype') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input class="col-100 f-add mr-20" type="text" name="name" minlength="1" placeholder="Type Name" required autocomplete="off">
                                    <button class="btn-search mr-20" type="submit" name="update" value="{{$type->id}}">Update</button>
                                </form>
                                <form class="row" action="{{ route('updatetype') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn-search delete mr-20" type="submit" name="delete" value="{{$type->id}}">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                        $x++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @error('name')
                <div class="row mt-20">
                    <div class="col-100 f-20 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
            </div>
        </div>
    </div>

    @if (session('status'))
    <div class=" alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @endsection
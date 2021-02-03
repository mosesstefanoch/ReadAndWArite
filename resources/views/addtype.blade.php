@extends('layouts.app')
@section('content')

<div class="center">
    <div class=" row col-60">
        <div class="mr-20 col-50">
            <div class="center">
                <table>
                    <thead>
                        <th>Number</th>
                        <th>Stationary Type Name</th>
                    </thead>
                    <tbody>
                        @php
                        $x=1;
                        @endphp
                        @foreach ($types as $type)
                        <tr>
                            <td>{{$x + 10 * ($types->currentPage()-1)}}</td>
                            <td>{{$type->name}}</td>
                        </tr>
                        @php
                        $x++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="center margin-t">
                <div class="row col-60 pagination">
                    @if ($types->lastPage() > 1)
                    @if ($types->onFirstPage())
                    <div>
                        <a class="prev disabled" href="#">Back</a>
                    </div>
                    @else
                    <div>
                        <a class="prev" href="{{ $types->previousPageUrl() }}">Back</a>
                    </div>
                    @endif
                    @for($x=1; $x <=$types->lastPage(); $x++)
                        @if($types->currentPage() == $x)
                        <div>
                            <a class="page active" href="{{ $types->url($x) }}">{{$x}}</a>
                        </div>
                        @else
                        <div>
                            <a class="page" href="{{ $types->url($x) }}">{{$x}}</a>
                        </div>
                        @endif
                        @endfor
                        @if ($types->hasMorePages())
                        <div>
                            <a class="next" href="{{ $types->nextPageUrl() }}">Next</a>
                        </div>
                        @else
                        <div>
                            <a class="next disabled" href="#">Next</a>
                        </div>
                        @endif
                        @endif
                </div>
            </div>
        </div>
        <div class="col-60">
            <form action="{{ route('posttype') }}" method="POST" enctype="multipart/form-data">
                <div id="image" class="f-add mb-10">
                    <div class="row bold f-15">
                        <div class="mr-20">
                            Browse Photos
                        </div>
                        <input type="file" name="image" onchange="loadimage()" required>
                    </div>
                </div>
                @csrf
                <div>
                    <input class=" col-100 f-add mb-10" type="text" name="name" minlength="1" placeholder="Enter Name" required>
                </div>
                @error('name')
                <div class="row pb-20">
                    <div class="col-100 t-center error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <button class="btn-search" type="submit" name="submit">Add New Stationary</button>
            </form>
        </div>
    </div>
</div>

@if (session('status'))
<div class=" alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endsection
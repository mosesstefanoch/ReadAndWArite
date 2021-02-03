@extends('layouts.app')
@section('content')

@if(Auth::check())
    @if(Auth::user()->is_admin)
    <div class="center">
        <div class="row col-60 mb-20">
            <a class="btn-search mr-20" href="{{ route('addstationary') }}">Add New Stationary</a>
            <a class="btn-search mr-20" href="{{ route('addtype') }}">Add New Stationary Type</a>
            <a class="btn-search" href="{{ route('edittype') }}">Edit Stationary Type</a>
        </div>
    </div>
    @endif
@endif
@if(count($stationaries) == 0 && $_SERVER['REQUEST_URI'] != '/home')
<script>
    window.location.href = ("{{ route('home')}}");
</script>
@endif
<div class="center column">
    <div class="row col-60 even wrap">
        @for($y=0; $y < 2; $y++)
            @for($x=1; $x <= 3; $x++)
                @if($x + 3 * $y - 1 < count($stationaries))
                    <div class="col-30"> 
                        <a class="col-100 column center stationary mb-20" href="{{route('viewstationary', $stationaries[$x + 3 * $y - 1]->id)}}">
                        <div class="center col-80 mb-10 mt-20">
                                <img class="col-100" src="/storage/uploads/stationary/{{$stationaries[$x + 3 * $y - 1]->image}}">
                            </div>
                            <div class="col-80 s-name bold mb-10">
                                {{$stationaries[$x + 3 * $y - 1]->name}}
                            </div>
                            <div class="col-80 s-desc mb-10 t-wrap">
                                {{$stationaries[$x + 3 * $y - 1]->description}}
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-30 column center mb-20">
                    </div>
                @endif
            @endfor
        @endfor
    </div>
    <div class="center col-100 margin-t">
        <div class="row col-60 pagination">
            @if ($stationaries->lastPage() > 1)
                @if ($stationaries->onFirstPage())
                <div>
                    <a class="prev disabled" href="#"><</a>
                </div>
                @else
                <div>
                    <a class="prev" href="{{ $stationaries->previousPageUrl() }}"><</a>
                </div>
                @endif
                @for($x = 1; $x <= $stationaries->lastPage(); $x++)
                    @if($stationaries->currentPage() == $x)
                    <div>
                        <a class="page active" href="{{ $stationaries->url($x) }}">{{$x}}</a>
                    </div>
                    @else
                    <div>
                        <a class="page" href="{{ $stationaries->url($x) }}">{{$x}}</a>
                    </div>
                    @endif
                @endfor
                @if ($stationaries->hasMorePages())
                <div>
                    <a class="next" href="{{ $stationaries->nextPageUrl() }}">></a>
                </div>
                @else
                <div>
                    <a class="next disabled" href="#">></a>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endsection
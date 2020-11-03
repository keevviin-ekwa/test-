@extends('layouts.app')

@section('content')

<div class="container my-5">

    <div class="container text-center">
        <a class="btn badge-primary" href="{{route('create')}}">Add product</a>
    </div>
    <div class="container mt-5">

        @if(isset($products))
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap">
                        <img src="/storage/image/{{$product->image}}">
                    </div>
                    <figcaption class="info-wrap text-center">
                        <h6 class="title text-dots"><a href="#">{{$product->name}}</a></h6>
                        <div class="action-wrap">
                            <a href="{{route('edit',$product->id)}}" class="btn btn-primary btn-sm float-left"> edit </a>
                            <a href="{{route('destroy',$product->id)}}" class="btn btn-danger btn-sm float-right"> delete </a>
                        </div> <!-- action-wrap -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            @endforeach

        </div>
        @else
        <div class="container">
            {{$test}}
        </div>
        @endif
    </div>
</div>
        @endsection
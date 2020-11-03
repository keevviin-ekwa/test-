@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="post" enctype="multipart/form-data" action="{{route('store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" required>

            </div>
            <div class="form-group">
                <label for="pwd">description:</label>
                <textarea type="text" class="form-control" id="description" value="{{$product->description}}"  name="description" required></textarea>
            </div>
            <div class="form-group">
                <input type="file" id="myFile" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">
                Update
            </button>
        </form>

@endsection
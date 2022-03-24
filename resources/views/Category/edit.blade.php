@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Edit Category</h1>
            <form action="{{route('c_update')}}" method="post">
                @csrf()
                @method('post')
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group row justify-content-center">
                    <div class="col-md-5">
                        <label> Name</label>
                        <input class=" form-control  " type="text" name="name" value="{{$category->name}}" placeholder="category name">
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label> Description</label>
                        <textarea class=" form-control" name="description" placeholder="write category description">{{$category->description}}</textarea>
                        @error('description')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
                <button class="btn btn-success" type="submit" title="save category" style="float:right">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
    
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Create Category</h1>
            <!-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
            <form action="/category/store" method="post">
                @csrf()
                @method('post')
                <div class="form-group row justify-content-center">
                    <div class="col-md-5">
                        <label> Name</label>
                        <input class=" form-control  " type="text" name="name" placeholder="category name">
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label> Description</label>
                        <!-- <input class=" form-control  " type="text" name="description" placeholder="write category description"> -->
                        <textarea class=" form-control" name="description" placeholder="write category description"></textarea>
                        @error('description')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <button class="btn btn-success" type="submit" title="save category" style="float:right">Submit</button>
                
            </form>
        </div>
    </div>
</div>
@endsection
    
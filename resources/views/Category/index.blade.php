@extends('layouts.app')

@section('title')
    category Index
@endsection

@section('content')

<div class="container">
    <h3>Category List<span><a href="/category/create" target="_blank" title="create category">+</a></span></h3>
    
    <div class="card">
        <div class="card-body">
            <div class="table ">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Decription</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="row ">
                                    <a class="btn btn-info" href="{{route('c_edit',$category->id)}}" target="_blank" title="edit categpry">Edit</a>&nbsp;
                                    <form action="{{route('c_delete')}}" method="post">
                                        @csrf()
                                        @method('delete')
                                        <input type="hidden" name="categoryId" value="{{$category->id}}">
                                        <button class="btn btn-danger" type="submit" title="Delete categpry">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>

@endsection
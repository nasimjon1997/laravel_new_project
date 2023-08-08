@extends('category.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
                <input type="button" class="btn btn-primary" onclick="history.back();" value="Back"/>
                <a  type="button" class="btn btn-warning" href="{{ url('/') }}">Main Page</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Title</th>
            <th>Description</th>
            <th>Slug</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $new_str = str_replace(" ", '_', $category->title) }}</td>
                <td>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $categories->links() !!}
@endsection

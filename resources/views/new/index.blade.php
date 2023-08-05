@extends('new.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD/post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Create New Post</a>
                <input type="button" class="btn btn-primary" onclick="history.back()" value="Back">
            </div>
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
            <th class="col-xs-1 col-sm-1 col-md-1">Title</th>
            <th class="col-xs-3 col-sm-3 col-md-3">Content</th>
            <th class="col-xs-1 col-sm-1 col-md-1">Slug</th>
            <th>Cid</th>
            <th>Uid</th>
            <th class="col-xs-1 col-sm-1 col-md-1">Status</th>
            <th class="col-xs-1 col-sm-1 col-md-1">Created</th>
            <th class="col-xs-1 col-sm-1 col-md-1">Modified</th>
        </tr>
        @foreach ($news as $new)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $new->title }}</td>
                <td>{{ $new->content }}</td>
                <td>{{ $new->slug }}</td>
                <td>{{ $new->cid }}</td>
                <td>{{ $new->uid }}</td>
                <td>{{ $new->status }}</td>
                <td>{{ $new->created }}</td>
                <td>{{ $new->modified }}</td>
                <td>
                    <form action="{{ route('news.destroy',$new->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('news.show',$new->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('news.edit',$new->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $news->links() !!}
@endsection

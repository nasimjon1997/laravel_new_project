@extends('post.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD/post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Create New Post</a>
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
            <th>Title</th>
            <th>Content</th>
            <th>Slug</th>
            <th>Cid</th>
            <th>Uid</th>
            <th>Status</th>
            <th>Created</th>
            <th>Modified</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($news as $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->dcontent }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->cid }}</td>
                <td>{{ $post->uid }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created }}</td>
                <td>{{ $post->modified }}</td>
                <td>
                    <form action="{{ route('news.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('news.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('news.edit',$post->id) }}">Edit</a>

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

@extends('post.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <input type="button" class="btn btn-primary" onclick="history.back()" value="Back">
                <a type="button" class="btn btn-warning" href="{{ url('/') }}">Main Page</a>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('posts.index') }}" method="get">
        <div class="row">
            <div class="col-md-10 form-group">
                <label for="">Title</label>
                <select name="category_title" class="form-select form-select-sm" aria-label=".form-select-sm">
                    <option></option>
                    @foreach (\App\Models\Category::all() as $item)
                        <option value="{{ $item->id }}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $item->id) selected @endif @endif>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 form-group" style="margin-top:25px;">
                <input type="submit" class="btn btn-primary" value="Filter">
            </div>
        </div>
    </form>
    <br>

    <br>
    <table class="table table-responsive table-bordered table-stripped">
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">Title</th>
                <th class="col-xs-6 col-sm-6 col-md-6">Content</th>
                <th class="col-xs-2 col-sm-2 col-md-2">Created</th>
                <th class="col-xs-2 col-sm-2 col-md-2">Category</th>
                <th class="col-xs-2 col-sm-2 col-md-2">Show</th>
            </tr>

            @foreach ($post as $posts)
                <tr>
                    <td>{{$posts->titles}}</td>
                    <td>{{ Str::limit($posts->content, 20) }}</td>
                    <td>{{date('d M Y', strtotime($posts->created)) }}</td>
                    <td>{{ $posts->title }}</td>
                    <td><a href="{{ route('news.show',$posts->id) }}" class="btn1">Show</a></td>
                </tr>
            @endforeach
    </table>
    <br>
    {{ $post->withQueryString()->links('vendor.pagination.bootstrap-4') }}
@endsection

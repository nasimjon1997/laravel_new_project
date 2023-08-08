@extends('new.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea type="text" name="content" class="form-control" placeholder="Content"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div type="button" class="btn btn-primary">
                    <strong>Cid:</strong>
                    <select class="btn btn-info" name="cid">
                        @foreach($data as $row)
                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Uid:</strong>
                    <input type="number" name="uid" class="form-control" placeholder="Uid">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div type="button" class="btn btn-primary">
                    <strong>Status:</strong>
                    <select class="btn btn-info" name="status" required="required">
                        <option>Published</option>
                        <option>Draft</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="reset" class="btn btn-danger">
            </div>
        </div>


    </form>

@endsection

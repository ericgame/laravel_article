@extends('layouts.app')

@section('content')

<section class="container">
    <h5>新增文章</h5>
    <form action="{{ url('article') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="text1">主題:</label> <b class="text-danger">{{ $errors->first('title') }}</b>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="text1">
        </div>
        <div class="form-group">
            <label for="text2">內容:</label> <b class="text-danger">{{ $errors->first('content') }}</b>
            <textarea name="content" cols="30" rows="10" class="form-control" id="text2">{{ old('content') }}</textarea>
        </div>
        <input type="submit" value="送出" class="btn btn-primary">
    </form>
</section>

@endsection
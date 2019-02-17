@extends('layouts.app')

@section('content')

<section class="container">
    <a href="{{ url('article/create') }}" role="btn" class="btn btn-primary float-right">新增</a>
    <table class="table table-hover">
        @foreach($query as $var)
            <tr>
                <td>{{ $var->id }}</td>
                <td>{{ $var->title }}</td>
                <td><a href="{{ url('article/'.$var->id.'/edit') }}" role="btn" class="btn btn-warning">編輯</a></td>
                <td>
                    <form action="{{ url('article/'.$var->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" role="btn" class="btn btn-danger" value="刪除" >
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</section>

@endsection
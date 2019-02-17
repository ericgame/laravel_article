{{-- {{ $todos }} --}}
{{-- {{ $errors }} --}}

@if ($errors->has('title'))
    <strong>{{ $errors->first('title') }}</strong>
@endif

@foreach ($todos as $todo)
    <p>
        {{ $todo->id.'.'.$todo->title }}
        <form action="{{url('todo/'.$todo->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="刪除">
        </form>
    </p>
@endforeach

<form action="{{url('todo')}}" method="POST">
    @csrf
    <input type="text" placeholder="請輸入" name="title">
    <input type="submit" value="送出">
</form>
<!DOCTYPE html>
<html>
<body>
<h3>通訊錄</h3>

@foreach ($games as $game)
    <p>
        {{ $game->id.'. '.$game->name .' : '. $game->phone }}
        <form action="{{url('game/'.$game->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="刪除">
        </form>
        <form action="{{url('update_view/'.$game->id)}}" method="POST">
            @csrf
            <input type="submit" value="修改">
        </form>
    </p>
@endforeach

<br>
<p>新增資料：</p>
<form action="{{url('/insert')}}" method="POST">
    @csrf
    <p>姓名:<input type="text" name="name" value="{{ old('name') }}"> {{ $errors->first('name') }}</p>
    <p>電話:<input type="text" name="phone" value="{{ old('phone') }}"> {{ $errors->first('phone') }}</p>
    <input type="submit" value="送出">
</form>

</body>
</html>

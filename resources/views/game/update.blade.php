<!DOCTYPE html>
<html>
<body>
<h3>通訊錄</h3>

<p>修改資料：</p>
<form action="{{url('update/'.$games->id)}}" method="POST">
    @csrf
    <p>姓名:<input type="text" name="name" value="@if(old('name')!==null){{old('name')}}@else{{$games->name}}@endif"> {{ $errors->first('name') }}</p>
    <p>電話:<input type="text" name="phone" value="@if(old('phone')!==null){{old('phone')}}@else{{$games->phone}}@endif"> {{ $errors->first('phone') }}</p>
    <input type="submit" value="送出">
</form>

<br>
<a href="{{url('game')}}">回首頁</a>
</body>
</html>

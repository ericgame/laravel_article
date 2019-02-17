<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //model

class TodoController extends Controller
{
    public function index()
    {
        $todos=Todo::all();
        // dd($todos); //列出資料

        return view('todo.index',[
            'todos'=>$todos
        ]);
    }

    //新增資料
    public function update(Request $request)
    {
        //驗證
        $validated=$request->validate([
            'title' => 'required|min:3'
        ]);

        //測試
        //return $request->all();
        
        //方法1
        // $todo=new Todo();
        // $todo->title=$request->title;
        // $todo->save();
        // return $todo;
        
        //方法2
        // $todo=Todo::create([
        //     'title' => $request->title
        // ]);
        // return $todo;

        //方法3
        // $todo=Todo::create($request->all()); //$request為未驗證資料
        $todo=Todo::create($validated); //$validated為已驗證資料
        //return $todo;
        return redirect('todo');
    }

    //刪除資料
    public function destroy(Request $request,Todo $todo)
    {
        //測試
        // dd($todo);
        // return $todo;

        $todo->delete();
        return redirect('todo');
    }
}

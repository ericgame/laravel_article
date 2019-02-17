<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Game; //model

class GameController extends Controller
{
    public function index()
    {
        $games=Game::all(); //查詢全部資料
        return view('game.index',['games'=>$games]);
    }

    //新增資料
    public function insert(Request $request)
    {
        //資料驗證
        $validated=Validator::make(
            $request->all(),
            [
                'name'=>'required|min:3',
                'phone' => 'required|min:3',
            ],
            [
                'name.required'=>'請填寫姓名',
                'name.min'=>'姓名最少3個字',
                'phone.required'=>'請填寫電話',
                'phone.min'=>'電話最少3個字',
            ]
        );

        //驗證失敗
        if ($validated->fails()) {
            return redirect('game')
                        ->withErrors($validated)
                        ->withInput();
        }

        //驗證成功
        Game::create($request->all()); //新增資料
        return redirect('game');
    }

    //刪除資料:方法1
    public function delete($id)
    {
        Game::destroy($id);
        return redirect('game');
    }

    //刪除資料:方法2
    // public function delete($id)
    // {
    //     $game=Game::find($id);
    //     $game->delete();
    //     return redirect('game');
    // }

    //刪除資料:方法3
    // public function delete(Game $id)
    // {
    //     $id->delete();
    //     return redirect('game');
    // }

    //修改資料介面
    public function update_view($id)
    {
        $games=Game::find($id); //查詢資料
        return view('game.update',['games'=>$games]);
    }

    //修改資料
    public function update(Request $request,$id)
    {
        //資料驗證
        $validated=Validator::make(
            $request->all(),
            [
                'name'=>'required|min:3',
                'phone' => 'required|min:3',
            ],
            [
                'name.required'=>'請填寫姓名',
                'name.min'=>'姓名最少3個字',
                'phone.required'=>'請填寫電話',
                'phone.min'=>'電話最少3個字',
            ]
        );

        //驗證失敗
        if ($validated->fails()) {
            return redirect('update_view/'.$id)
                        ->withErrors($validated)
                        ->withInput();
        }else{
            $game=Game::find($id);

            $game->name=$request->name;
            $game->phone=$request->phone;
            $game->save();
    
            return redirect('game');
        }
    }

}

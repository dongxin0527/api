<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('goods')->get();
        return json_encode(['err'=>1,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->input();
        $res = DB::table('goods')->insert($data);
        if(!empty($res)){
            return json_encode(['msg'=>"添加成功",'err'=>1]);
        }else{
            return json_encode(['msg'=>"添加失败",'err'=>2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('goods')->where('goods_id',$id)->first();
        return json_encode(['err'=>1,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        unset($data['_method']);
        $res = DB::table('goods')->where('goods_id',$id)->update($data);
        if(!empty($res)){
            return json_encode(['msg'=>"修改成功",'err'=>1]);
        }else{
            return json_encode(['msg'=>"修改失败",'err'=>2]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('goods')->where('goods_id',$id)->delete();
        if(!empty($res)){
            return json_encode(['msg'=>"删除成功",'err'=>1]);
        }else{
            return json_encode(['msg'=>"删除失败",'err'=>2]);
        }
    }
}

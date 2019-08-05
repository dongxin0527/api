<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{	
	/**
	 * 商品添加页
	 * @return [type] [description]
	 */
    public function goods_add()
    {
    	return view('goods.goods_add');
    }
    /**
     * 商品展示页
     * @return [type] [description]
     */
    public function goods_list()
    {
    	return view('goods.goods_list');
    }
    /**
     * 商品修改页
     * @return [type] [description]
     */
    public function goods_upd()
    {
    	return view('goods.goods_upd');
    }
}

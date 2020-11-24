<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;

class searchController extends Controller
{
    protected $IndexService;
    protected $CategoryService;
    protected $BaneerService;
    
    public function __construct()
    {
        $this->CategoryService = new CategoryService();
        $this->IndexService = new IndexService();
        $this->BaneerService = new BaneerService();
    }        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Category_and_commodity = Request()->all();
        $commodity_data = $this->IndexService->search_Commodity_Service($Category_and_commodity);
        $count=count($commodity_data);
        if($count==0){
            $msg = [
                      'msg' => '該分類無此商品'
                    ];
        }else{
            $msg = [
                      'msg' => '已搜尋到'.$count.'個商品'
                    ];
        }
        $data=$this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer =$this->BaneerService->img();
        $commodity = $this->IndexService->getCommodity();
        // dd($msg);
        return view('search.search',compact('data','Category','baneer','commodity','commodity_data','msg'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

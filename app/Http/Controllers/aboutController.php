<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;

class aboutController extends Controller
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
        $data = $this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer = $this->BaneerService->img();
        $commodity = $this->IndexService->getCommodity();
        return view('about.about',compact('data','Category','baneer'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

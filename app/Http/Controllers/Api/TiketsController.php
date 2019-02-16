<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;

class TiketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Tiket::all();
        return DB::table('tikets')->where('deleted_at', '=', null)->get();

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tiket= new Tiket;
        $tiket->name=$request->name;
        $tiket->text=$request->text;
        $tiket->status=$request->status;
        $tiket->save();
        //$tiket = Tiket::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Tiket::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tiket = Tiket::findOrFail($id);
        $tiket->name=$request->name;
        $tiket->text=$request->text;
        $tiket->save();
        return $tiket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tiket = Tiket::find($id);

        $tiket->delete();

    }
    public  function updateStatus(Request $request, $id){

        //dd($request->all());
        $tiket = Tiket::findOrFail($id);

        $tiket->status=$request->status;

        $tiket->save();

    }

}

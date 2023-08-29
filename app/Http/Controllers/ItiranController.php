<?php

namespace App\Http\Controllers;

use App\Models\Itiran;
use App\Models\Maker;
use Illuminate\Http\Request;

class ItiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$itirans = Itiran::latest()->paginate(5);
        $itirans = itiran::select([
            'b.id',
            'b.syouhinmei',
            'b.kakaku',
            'b.zaikosuu',
            'r.str as maker',
        ])
        ->from('itirans as b')
        ->join('makers as r', function($join) {
            $join->on('b.maker','=', 'r.id');
        })
        ->orderBy('b.id','DESC')
        ->paginate(5);

        return view('index',compact('itirans'))
            ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();
        return view('create')
            ->with('makers',$makers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'syouhinmei' => 'required|max:20',
            'maker' => 'required|integer',
            'kakaku' => 'required|integer',
            'zaikosuu' => 'required|integer',
        ]);
        
        $itiran = new Itiran;
        $itiran->syouhinmei = $request->input('syouhinmei');
        $itiran->maker = $request->input('maker');
        $itiran->kakaku = $request->input('kakaku');
        $itiran->zaikosuu = $request->input('zaikosuu');
        $itiran->save();
       
        return redirect()->route('itirans.index'); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function show(Itiran $itiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Itiran $itiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itiran $itiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itiran $itiran)
    {
        //
    }
}

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
            ->with('page_id',request()->page)
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
            ->with('page_id',request()->page_id)
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
        
        if(request('image')){
            $name=request()->file('image')->getClientOriginalName();
            $file=request()->file('image')->move('storage/images',$name);
            $itiran->image=$name;
        }
        $itiran->syouhinmei = $request->input('syouhinmei');
        $itiran->maker = $request->input('maker');
        $itiran->kakaku = $request->input('kakaku');
        $itiran->zaikosuu = $request->input('zaikosuu');
        $itiran->save();
       


        return redirect()->route('itiran.create')->with('success','登録しました');
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function show(Itiran $itiran)
    {
        $makers = Itiran::all();
        return view('show',compact('itiran','makers'))
        ->with('page_id',request()->page_id)
        ->with('makers',$makers);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Itiran $itiran)
    {
        $makers = maker::all();
        return view('edit',compact('itiran','makers'))
        ->with('page_id',request()->page_id);
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
        $request->validate([
            'syouhinmei' => 'required|max:20',
            'maker' => 'required|integer',
            'kakaku' => 'required|integer',
            'zaikosuu' => 'required|integer',
        ]);
        
        $itiran->syouhinmei = $request->input('syouhinmei');
        $itiran->maker = $request->input('maker');
        $itiran->kakaku = $request->input('kakaku');
        $itiran->zaikosuu = $request->input('zaikosuu');
        $itiran->save();
       
        return redirect()->route('itirans.index')->with('success','変更しました'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Itiran  $itiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itiran $itiran)
    {
        $itiran->delete();
        return redirect()->route('itirans.index')
            ->with('success','商品'.$itiran->syouhinmei.'を削除しました');
    }

    public function search(Request $request)
    {
        $syouhinmei = $request->input('syouhinmei');
        $maker = $request->input('maker');

        $query = Itiran::query();
    
        if ($syouhinmei) {
            $query->where('syouhinmei', 'like', '%' . $syouhinmei . '%');
        }
    
        if ($maker) {
            $query->where('maker',$maker);
        }
        $itirans = $query->paginate(10);
        $page_id = $request->input('page_id');

        $makers = Maker::all();

        return view('index',compact('itirans','makers'))
        ->with('page_id',request()->page_id);
    } 
}
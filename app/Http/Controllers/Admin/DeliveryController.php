<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryTime;
use Carbon\Carbon;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.delivery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $derivery_time = Curriculum::findOrFail($curriculumId);
        return view('delivery.create', compact('derivery_time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'curriculum_id' => 'required|exists:curriculums,id',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
        ]);

        DeliveryTime::create($validatedData);

        return redirect()->route('derivery_time.index')->with('success', '配信日時が登録されました。');
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
        $deliveryTime = DeliveryTime::where('curriculums_id', $id)->firstOrFail();
        $deliveryTime->delivery_from = Carbon::parse($deliveryTime->delivery_from);
        $deliveryTime->delivery_to = Carbon::parse($deliveryTime->delivery_to);

        return view('admin.layouts.delivery', compact('deliveryTime'));
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
        $request->validate([
            'delivery_from' => 'required|date',
            'delivery_to' => 'required|date',
        ]);

        $deliveryTime = DeliveryTime::where('curriculums_id', $id)->firstOrFail();
        $deliveryTime->update([
            'delivery_from' => $request->input('delivery_from'),
            'delivery_to' => $request->input('delivery_to'),
        ]);

        return redirect()->route('curriculum_list')->with('success', '配信日時が更新されました');
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

    public function save(Request $request)
    {
       //
    }
}
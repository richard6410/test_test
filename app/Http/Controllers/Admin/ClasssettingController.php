<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classsetting;
use App\Models\Grade;
use App\Models\Curriculum;



class ClasssettingController extends Controller
{
    public function create()
    {
        $grades = Grade::all(); // 学年情報を取得

        return view('classsetting', compact('grades'));
    
    }

    public function store(Request $request)
    {
        $curriculum = new Curriculum();

        if ($request->has('curriculum_id')) {
            $curriculum = Curriculum::findOrFail($request->input('curriculum_id'));
        }

        $curriculum->title = $request->input('name');
        $curriculum->video_url = $request->input('video_url');
        $curriculum->description = $request->input('description');
        $curriculum->grade_id = $request->input('grade');
        $curriculum->alway_delivery_flg = $request->has('public') ? 1 : 0;

        // サムネイル画像の処理
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('thumbnails'), $filename);
            $curriculum->image = $filename;
        }

        $curriculum->save();

        return redirect()->route('classsetting.create');
        }
}

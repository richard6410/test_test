<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Classsetting;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    // カリキュラムの一覧を表示
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('admin.layouts.curriculum_list', compact('curriculums'));
    }

    // カリキュラム作成フォームを表示
    public function create()
    {
        $grades = Grade::all(); // 学年情報を取得
        return view('admin.layouts.curriculum_editg', compact('grades'));
    }

    // 新しいカリキュラムを保存
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

        return redirect()->route('admin.curriculums.edit');
    }

    // カリキュラムを表示
    public function show($id)
    {
        // 表示ロジックをここに記述
    }


    public function edit($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        return view('admin.layouts.curriculum_edit', compact('curriculum'));
    }

    // カリキュラムを更新
    public function update(Request $request, $id)
    {
        // 更新ロジックをここに記述
    }

    // カリキュラムを削除
    public function destroy($id)
    {
        // 削除ロジックをここに記述
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showClassSettingForm()
    {
        // ここで$classsettingを初期化またはデータベースから取得します
      //  $classsetting = ...; // クラス設定の取得方法に応じて適切なコードを追加してください

        // ビューにデータを渡して表示します
        return view('classsetting', ['classsetting' => $classsetting]);
    }
}

@extends('admin.layouts.app')

@section('content')
<h1>授業一覧</h1>

<table>
        <tr>
            <th>ID</th>
            <th>サムネイル</th>
            <th>タイトル</th>
            <th>動画URL</th>
            <th>常時公開</th>
            <th>クラスID</th>
            <th></th>
            <th></th>
        </tr>

        @foreach ($curriculums as $curriculum)
            <tr>
                <td>{{ $curriculum->id }}</td>
                <td>
                    @if ($curriculum->thumbnail)
                        <img src="{{ asset('storage/images/' . $curriculum->thumbnail) }}" alt="カリキュラム画像" class="img-thumbnail" width="100">
                    @else
                        画像なし
                    @endif
                </td>
                <td>{{ $curriculum->title }}</td>
                <td>{{ $curriculum->description }}</td>
                <td>{{ $curriculum->video_url }}</td>
                <td>{{ $curriculum->alway_delivery_flg }}</td>
                <td>{{ $curriculum->classes_id }}</td>
                <td>
                    <a href="{{ route('curriculum_edit', $curriculum->id) }}" class="btn btn-primary">授業内容編集</a>
                </td>
                <td>
                    <a href="{{ route('delivery_edit', $curriculum->id) }}" class="btn btn-primary">配信日時編集</a>
                </td>
            </tr>
        @endforeach
</table>
@endsection


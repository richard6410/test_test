@extends('admin.layouts.app')

@section('content')
<h1>授業一覧</h1>

<table>
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
        </tr>
    @endforeach
</table>
@endsection


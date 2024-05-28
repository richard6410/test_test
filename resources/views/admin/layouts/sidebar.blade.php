<div id="sidebar" class="sidebar">
    <h2>学年選択</h2>
    <ul>
        @foreach ($grades as $grade)
            <li>
                <a href="{{ route('curriculums_by_grade', $grade->id) }}">{{ $grade->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

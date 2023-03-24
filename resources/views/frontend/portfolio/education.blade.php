<section id="education">
    <h1>Education</h1>
    <div class="education-wrapper">
        @foreach ($user['educations'] as $index => $education)
            <div class="education-container invisible"
                id="education-container-{{$index}}">
                <div class="education-period text-end">
                    {{$education['period_start']}} - {{$education['period_end']}}
                </div>
                <div class="education-name">{{$education['name']}}</div>
                <div class="education-description">
                    {{$education['description']}}
                </div>
            </div>
        @endforeach
    </div>
</section>
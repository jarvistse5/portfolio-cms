<section id="education">
    <h1>Education</h1>
    <br>
    <div class="education-wrapper">
        @foreach ($user['educations'] as $index => $education)
            <div class="education-container invisible"
                id="education-container-{{$index}}">
                <div class="education-header">
                    <div class="education-name">{{$education['name']}}</div>
                    <div class="education-period">
                        {{$education['period_start']}} - {{$education['period_end']}}
                    </div>
                </div>
                <div class="education-description">
                    {{$education['description']}}
                </div>
            </div>
        @endforeach
    </div>
</section>
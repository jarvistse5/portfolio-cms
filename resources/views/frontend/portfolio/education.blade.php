<section id="education">
    <div class="section-title-container">
        <div class="title-gradient"></div>
        <h1>Education</h1>
        <div class="dot"></div>
    </div>
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
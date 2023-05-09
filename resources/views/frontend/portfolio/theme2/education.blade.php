<section id="education">
    <div class="section-title-container">
        <h1>Education</h1>
        <div class="breakline"></div>
    </div>
    <div class="education-container">
        <div class="image-container">
            <img src="{{url('assets/images/theme2/education.png')}}" alt="Education">
        </div>
        <div class="content-container">
            @foreach ($user['educations'] as $education)
                <div class="education-grid gradient-grid">
                    <div class="education-period">
                        {{$education['period_start']}} - {{$education['period_end']}}
                    </div>
                    <div class="education-name gradient-text">
                        {{$education['name']}}
                    </div>
                    <div class="education-description">
                        {{$education['description']}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
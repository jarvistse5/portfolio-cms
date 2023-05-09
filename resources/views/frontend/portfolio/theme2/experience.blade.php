<section id="experience">
    <div class="section-title-container">
        <h1>Experience</h1>
        <div class="breakline"></div>
    </div>
    <div class="experience-container">
        @foreach ($user['experiences'] as $experience)
            <div class="experience-grid gradient-grid">
                <div class="experience-header">
                    <div class="experience-title gradient-text">
                        {{$experience['title']}}
                    </div>
                    <div class="experience-period">
                        {{$experience['period_start']}} - {{$experience['period_end']}}
                    </div>
                </div>
                <div class="experience-company">
                    {{$experience['company']}}
                </div>
                <div class="experience-description">
                    <ul>
                        @foreach ($experience['description'] as $description)
                            <li>{{$description}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</section>
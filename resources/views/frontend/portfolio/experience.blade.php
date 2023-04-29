<section id="experience">
    <h1>Experience</h1>
    <br>
    <div class="experience-wrapper">
        @foreach ($user['experiences'] as 
        $index => $experience)
        <div class="experience-container invisible"
            id="experience-container-{{$index}}">
                <div class="experience-header">
                    <div class="experience-title">
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
<section id="skills">
    <div class="section-title-container">
        <h1>Skills</h1>
        <div class="breakline"></div>
    </div>
    <div id="skill-container" class="skill-container">
        @foreach (data_get($user, 'skills') as $skill)
            <div class="skill-grid gradient-grid">
                <div class="skill-content">
                    <div class="skill-image">
                        <img src="{{$skill['image']}}" alt="{{$skill['name']}}">
                    </div>
                    <div class="skill-name">
                        {{$skill['name']}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
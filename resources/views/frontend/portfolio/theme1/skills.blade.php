<script>
    var skills = @json($user['skills']);
</script>

<section id="skills">
    <div class="section-title-container">
        <div class="title-gradient"></div>
        <h1>Skills</h1>
        <div class="dot"></div>
    </div>
    <br>
    <div id="tagcloud"></div>
    <div id="skill-container" class="skill-container">
        @foreach (data_get($user, 'skillRate') as $skillSessionLabel => $skillSession)
            <div class="skill-grid">
                <div class="skill-session-label">{{$skillSessionLabel}}</div>
                <div class="skill-session-divider"></div>
                @foreach ($skillSession as $skillLabel => $skillRate)
                    <div class="skill-grid-item">
                        <div>{{$skillLabel}}</div>
                        <div class="meter">
                            <span style="width:0%;" 
                                class="skill-rating"
                                data-rate="{{$skillRate}}">
                                <span class="progress"></span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

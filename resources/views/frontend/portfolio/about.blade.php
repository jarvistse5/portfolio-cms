<section id="about">
    <div class="about-text-container">
        <div class="padding-intro">
            @foreach (explode(PHP_EOL,$user['intro']) as $sentense)
                <div class="padding-intro intro-text">
                    @foreach (str_split($sentense) as $char)
                        <span class="blast">{{$char}}</span>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div id="typing-position" class="typing" data-position="{{$user['subTitle']}}">
        </div>
    </div>
    <div class="contacts-container">
        @if (isset($user['contacts']['email']) && $user['contacts']['email'])
            <a class="contact-button"
                href="mailto: {{$user['contacts']['email']}}" target="_blank">
                <i class="fa-solid fa-square-envelope"></i>
            </a>
        @endif
        @if (isset($user['contacts']['phone']) && $user['contacts']['phone'])
            <a class="contact-button"
                href="tel: {{$user['contacts']['phone']}}" target="_blank">
                <i class="fa-solid fa-square-phone"></i>
            </a>
        @endif
        @if (isset($user['contacts']['linkedin']) && $user['contacts']['linkedin'])
            <a class="contact-button"
                href="{{$user['contacts']['linkedin']}}" target="_blank">
                <i class="fa-brands fa-linkedin"></i>
            </a>
        @endif
        @if (isset($user['contacts']['github']) && $user['contacts']['github'])
            <a class="contact-button"
                href="{{$user['contacts']['github']}}" target="_blank">
                <i class="fa-brands fa-github"></i>
            </a>
        @endif
        @if (isset($user['contacts']['resume']) && $user['contacts']['resume'])
            <a class="contact-button"
                href="{{$user['contacts']['resume']}}" target="_blank">
                <i class="fa-solid fa-file-pdf"></i>
            </a>
        @endif
    </div>
    <div class="scroll-down-container">
        <div class="scroll-down animate__animated animate__bounce animate__infinite">
            <div>Scroll Down</div>
            <div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </div>
    <div class="gradient-layer"></div>
</section>
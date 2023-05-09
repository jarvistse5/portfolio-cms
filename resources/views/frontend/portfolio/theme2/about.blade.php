<section id="about">
    <div class="about-container">
        <div class="about-user">
            <div class="about-name">
                <span>{{$user['firstname']}}</span>
                <span>{{$user['lastname']}}</span>
            </div>
            <div class="subTitle">
                {{$user['subTitle']}}
            </div>
            <div class="breakline"></div>
            <div class="action-btn">
                <button id="view-portfolio-btn" class="primary-action-btn" data-url="{{$user['contacts']['portfolio']}}">
                    view portfolio
                </button>
                <button id="view-skills-btn" class="secondary-action-btn">
                    view skill
                </button>
            </div>
        </div>
        <div class="about-image">
            <img src="{{url('assets/images/theme2/about_uxui.png')}}" alt="background image">
        </div>
    </div>
    <div class="contacts-container">
        @if (isset($user['contacts']['email']) && $user['contacts']['email'])
            <a class="contact-button"
                href="mailto: {{$user['contacts']['email']}}" target="_blank">
                {{-- <i class="fa-solid fa-square-envelope"></i> --}}
                <img src="{{url('assets/images/icons/email.png')}}" alt="email">
            </a>
        @endif
        @if (isset($user['contacts']['phone']) && $user['contacts']['phone'])
            <a class="contact-button"
                href="tel: {{$user['contacts']['phone']}}" target="_blank">
                {{-- <i class="fa-solid fa-square-phone"></i> --}}
                <img src="{{url('assets/images/icons/phone.png')}}" alt="phone">
            </a>
        @endif
        @if (isset($user['contacts']['linkedin']) && $user['contacts']['linkedin'])
            <a class="contact-button"
                href="{{$user['contacts']['linkedin']}}" target="_blank">
                {{-- <i class="fa-brands fa-linkedin"></i> --}}
                <img src="{{url('assets/images/icons/linkedin.png')}}" alt="linkedin">
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
                {{-- <i class="fa-solid fa-file-pdf"></i> --}}
                <img src="{{url('assets/images/icons/adobe.png')}}" alt="adobe">
            </a>
        @endif
    </div>
    {{-- <div class="scroll-down-container">
        <div class="scroll-down animate__animated animate__bounce animate__infinite">
            <div>Scroll Down</div>
            <div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </div>
    <div class="gradient-layer"></div> --}}
</section>
<div class="header-container">
    <div class="header-topic gradient-text">
        portfolio
    </div>
    <div class="hidden md:block">
        <div class="menu-container">
            @foreach ($config['sessions'] as $sessionKey => $sessionLabel)
                <a class="menu-item" data-scroll="{{$sessionKey}}">
                    {{$sessionLabel}}
                </a>
            @endforeach
        </div>
    </div>
    <div class="md:hidden">
        <div class="menu-container-mobile">
            <div class="menu-button" id="menu-button">
                <div class="menu-button-bar1"></div>
                <div class="menu-button-bar2"></div>
                <div class="menu-button-bar3"></div>
            </div>
        </div>
        <div id="menu-page-container" class="hidden">
            <div class="menu-page-items">
                @foreach ($config['sessions'] as $sessionKey => $sessionLabel)
                    <a class="menu-item" data-scroll="{{$sessionKey}}">
                        {{$sessionLabel}}
                    </a>
                @endforeach
            </div>
            <div class="menu-contacts-container">
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
        </div>
    </div>
</div>
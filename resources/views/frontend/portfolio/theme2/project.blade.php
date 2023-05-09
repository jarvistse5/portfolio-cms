<script>
    var projects = @json($user['projects']);
</script>
<section id="project">
    <div class="section-title-container">
        <h1>Project</h1>
        <div class="breakline"></div>
    </div>
    @livewire('frontend.project-modal-theme2', [
        'user' => $user,
        'theme' => 2
    ])
    <div class="scroll-to-top" id="scroll-to-top">
        <i class="fa-solid fa-arrow-up gradient-text"></i>
    </div>
</section>
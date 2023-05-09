<section id="project">
    <div class="section-title-container">
        <h1>Project</h1>
        <div class="breakline"></div>
    </div>
    @livewire('frontend.project-modal', [
        'user' => $user,
        'theme' => 2
    ])
    <div class="scroll-to-top" id="scroll-to-top">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
</section>
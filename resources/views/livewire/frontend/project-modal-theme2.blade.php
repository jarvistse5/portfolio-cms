<div>
    <div x-data="{ type: 'uxui', projects: projects }" x-cloak>
        <div class="project-type-container">
            <button 
                x-on:click="type = 'uxui'" 
                class="project-type-btn"
                :class="{'selected-project-type': type == 'uxui'}">
                UXUI Design
            </button>
            <button 
                x-on:click="type = 'graphic'" 
                class="project-type-btn"
                :class="{'selected-project-type': type == 'graphic'}">
                Graphic Design
            </button>
        </div>
        <div class="project-grid">
            @foreach ($user['projects'] as $index => $project)
                <div class="project-grid-item" 
                    id="project-grid-{{$index}}" 
                    data-id="{{$index}}"
                    data-asset-count="{{count($project['assets'])}}"
                    x-show="projects[{{$index}}].skills.includes(type)"
                    wire:click="selected({{$index}})">
                    <div class="project-grid-image">
                        <img src="{{$project['cover_img']}}" alt="{{$project['name']}}">
                    </div>
                    <div class="project-grid-layer">
                        <div class="project-grid-name">{{$project['name']}}</div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($selectedProject)
            <div class="modal project-modal"
                id="project-modal-{{$selectedIndex}}">
                <div class="modal-container">
                    <div class="modal-header">
                        <div class="modal-content-title">{{$selectedProject['name']}}</div>
                        <span class="modal-close" 
                            data-modal="project-modal-{{$selectedIndex}}"
                            wire:click="unselect()">&times;</span>
                    </div>
                    <div class="modal-content">
                        {{-- <p class="modal-content-title">{{$selectedProject['name']}}</p> --}}
                        <p class="modal-content-description">{{$selectedProject['description']}}</p>
                        <br>
                        <div class="project-assets">
                            @php
                                $count = count($selectedProject['assets']);
                            @endphp
                            @foreach ($selectedProject['assets'] as $i => $asset)
                                <div class="modal-slide @if($page != $i+1) hidden @endif" 
                                    id="project-modal-{{$selectedIndex}}-page-{{$i+1}}">
                                    <div class="modal-slide-content">
                                        @php
                                            $isYoutube = false;
                                            if (data_get($asset, 'type') == 'youtube') {
                                                $isYoutube = true;
                                            } else {
                                                $extension = strtolower($asset['extension']);
                                                $isImage = $extension == 'png' 
                                                            || $extension == 'jpeg' 
                                                            || $extension == 'jpg' 
                                                            || $extension == 'gif';
                                                $isVideo = $extension == 'mp4' 
                                                            || $extension == 'mov';
                                            }
                                        @endphp
                                        @if ($isYoutube)
                                                <iframe class="youtube-player"
                                                    src="https://www.youtube.com/embed/{{data_get($asset, 'youtube_id')}}"
                                                    frameborder="0"
                                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                            </iframe>
                                        @elseif ($isImage)
                                            <img src="{{$asset['fileUrl']}}">
                                        @elseif ($isVideo)
                                            <video controls>
                                                <source src="{{$asset['fileUrl']}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                    <div class="numberText">{{$i+1}} / {{$count}}</div>
                                </div>
                            @endforeach
                            <a class="modal-prev" wire:click="prev()">&#10094;</a>
                            <a class="modal-next" wire:click="next()">&#10095;</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row gx-2">
        <div class="col-sm-8 col-12">
            <div class="card mb-1">
                <!-- Plyr Video Embed -->
                <div class="plyr__video-embed" id="player">
                    <iframe src="https://www.youtube.com/embed/{{ $current->iframe }}" frameborder="0" allowfullscreen=""
                        allowtransparency
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        style="width: 100%; height: 450px !important;"></iframe>
                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    {{-- NAVEGACiON DE LECCIONES --}}
                    <section id="contenido-bloques"
                        style="padding-top: 0px !important; padding-bottom: 0px !important;">
                        <div class="mi-card">
                            <div class="mi-card-content">
                                @if ($current && $current->iframe)
                                    <h1 class="color-general curso-status-title">{{ $current->name }}</h1>
                                @else
                                    <h1 class="color-general curso-status-title">Sin Datos por ahora</h1>
                                @endif

                                <div class="mt-3 d-flex justify-content-between">
                                    @if ($this->index == 0)
                                        <a class="btn btn-warning"
                                            wire:click="changeLesson({{ $current }})">Primero</a>
                                    @else
                                        <a class="btn btn-info"
                                            wire:click="changeLesson({{ $this->previous }})">Anterior</a>
                                    @endif

                                    @if ($this->next)
                                        <a class="btn btn-success"
                                            wire:click="changeLesson({{ $this->next }})">Siguiente</a>
                                    @else
                                        <a class="btn btn-info"
                                            wire:click="changeLesson({{ $current }})">Último</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- NAVEGACiON DE LECCIONES --}}
                </div>
            </div>
        </div>


        <div class="col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="lead">Curso <span class="text-success">{{ $course->title }}</span></h2>
                    <div class="d-flex justify-content-between">
                        <span>creado hace</span>
                        <span><strong>{{ $course->created_at->diffForHumans() }}</strong></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>por</span>
                        <span><strong>{{ $course->teacher->name }}</strong></span>
                    </div>
                </div>
            </div>

            {{-- BARRA DE PROGRESO --}}
            <div class="d-flex justify-content-between align-items-center">
                {{-- MARCAR COMO CULMINADA LA LECCION --}}
                <div class="d-flex justify-content-between" wire:click="completed">
                    @if ($current->completed)
                        <i class='bx bxs-toggle-right cursor-status'
                            style='color:rgb(31, 202, 9);  font-size: 29px'></i>
                        <span class="cursor-status" style='font-size: 18px'>culminado</span>
                    @else
                        <i class='bx bx-toggle-left cursor-status' style="font-size: 29px"></i>
                        <span class="cursor-status" style='font-size: 18px'>culminar</span>
                    @endif
                </div>
                {{-- MARCAR COMO CULMINADA LA LECCION --}}
            </div>
            <div class="progress" role="progressbar" aria-label="Example with label"
                aria-valuenow="{{ $this->advance }}" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: {{ $this->advance }}%">{{ $this->advance }} %</div>
            </div>
            {{-- BARRA DE PROGRESO --}}

            <div class="card">
                <div class="card-body">
                    {{-- INPRIMIENDO LAS SECCIONES DE LOS CURSOS --}}
                    <div class="accordion accordion-flush" id="accordionFlushExample"
                        style="max-height: 265px; overflow-y: auto;">
                        @foreach ($course->sections as $section)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $section->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{ $section->id }}" aria-expanded="false"
                                        aria-controls="flush-collapse{{ $section->id }}">
                                        <p class="color-general">{{ $section->titulo }}</p>
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $section->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading{{ $section->id }}"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($section->lessons as $lesson)
                                                <li class="d-flex gap-2">
                                                    {{-- ver si esta completada la leccion --}}
                                                    <div>
                                                        @if ($lesson->completed)
                                                            {{-- SI EL CURSO ESTA COMPLETO Y ESTAMOS EN ESA POSICION BORDEAMOS EL CIRCULO --}}
                                                            @if ($current->id == $lesson->id)
                                                                <i class='bx bx-play-circle bx-burst'
                                                                    style='color:rgb(52, 152, 219); font-size: 22px'></i>
                                                            @else
                                                                {{-- DE LO CONTRARIO QUE  ME PINTE DE VERDE --}}
                                                                <i class='bx bx-check-circle'
                                                                    style='color:rgb(52, 152, 219); font-size: 22px'></i>
                                                            @endif
                                                        @else
                                                            @if ($current->id == $lesson->id)
                                                                <i class='bx bx-play-circle bx-burst'
                                                                    style='color:#eeea12; font-size: 22px'></i>
                                                            @else
                                                                <i class='bx bx-bolt-circle'
                                                                    style='color:#99a29b; font-size: 22px'></i>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    {{-- NOMBRE DE LA LECCION --}}
                                                    <a style="margin-top: 2px" class="cursor-status"
                                                        wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}
                                                        @if ($lesson->resource)
                                                            <i class='bx bxs-file-pdf bx-burst'
                                                                style='color:#1112de'></i>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- INPRIMIENDO LAS SECCIONES DE LOS CURSOS --}}
                </div>
            </div>

            @section('scripts')
                <!-- Plyr Initialization Script -->
                <script>
                    document.addEventListener('livewire:load', function() {
                        // Inicializa Plyr al cargar la página
                        initPlyr();

                        // Escucha el evento 'lessonChanged' para reinicializar Plyr
                        Livewire.on('lessonChanged', function() {
                            initPlyr();
                        });
                    });

                    function initPlyr() {
                        const player = new Plyr('#player', {
                            controls: [
                                'play-large',
                                'play',
                                'progress',
                                'current-time',
                                'duration',
                                'mute',
                                'volume',
                                'captions',
                                'settings',
                                'pip',
                                'airplay',
                                'fullscreen'
                            ],
                            settings: ['captions', 'quality', 'speed', 'loop'],
                            speed: {
                                selected: 1,
                                options: [0.5, 1, 1.5, 2]
                            },
                            quality: {
                                default: 720,
                                options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360]
                            },
                            youtube: {
                                noCookie: true,
                                rel: 0,
                                showinfo: 0
                            }
                        });
                    }
                </script>

                <script>
                    document.addEventListener('livewire:load', function() {
                        Livewire.on('lessonChanged', function(sectionId) {
                            // Ocultar todos los acordeones
                            document.querySelectorAll('.accordion-item').forEach(function(item) {
                                item.classList.remove('show');
                            });

                            // Mostrar solo el acordeón correspondiente a la lección seleccionada
                            var targetId = "#flush-collapse" + sectionId;
                            var targetItem = document.querySelector(targetId);

                            if (targetItem && !targetItem.classList.contains('show')) {
                                targetItem.classList.add('show');
                                // Ajustar la posición del scroll al inicio de la página
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth' // Puedes cambiar a 'auto' si no quieres un desplazamiento suave
                                });
                            }
                        });

                        // Mostrar el acordeón al cargar la página
                        var currentSectionId = "{{ $current->section_id }}";
                        var initialTargetId = "#flush-collapse" + currentSectionId;
                        var initialTargetItem = document.querySelector(initialTargetId);

                        if (initialTargetItem && !initialTargetItem.classList.contains('show')) {
                            initialTargetItem.classList.add('show');
                            // Ajustar la posición del scroll al inicio de la página
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth' // Puedes cambiar a 'auto' si no quieres un desplazamiento suave
                            });
                        }
                    });
                </script>
            @endsection
        </div>
    </div>
</div>

<div>
    {{-- Be like water. --}}
    <section>
        <div class="">
            <h1 class="lead">Lecciones del Curso</h1>
            <div class="row">
                <div class="col-md-4">
                    {{-- LLAMADA DEL COMPONENTE ASIDE --}}
                    @component('components.instructor.aside')
                        {{-- Puedes pasar datos al componente si es necesario --}}
                        @slot('course', $course)
                    @endcomponent

                    <div class="card mt-3">
                        <div class="card-body">
                            <!-- FORMULARIO PARA CREAR UNA LECCION -->
                            @if (!$lesson_id)
                                <form wire:submit.prevent="create">
                                    <div class="form-group my-2">
                                        <label for="">Nombre:</label>
                                        <input wire:model="name" class="form-control" placeholder="nombre de la leccion"
                                            type="text" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="">URL:</label>
                                        <input wire:model="url" class="form-control" placeholder="url" type="text" />
                                        @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="section_id">Seccion</label>
                                        <select wire:model="section_id" class="form-select">
                                            @foreach ($sections as $section)
                                                <option class="bg-dark text-white" value="{{ $section->id }}">
                                                    {{ $section->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary mt-2 w-100">Guardar</button>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA CREAR UNA LECCION -->


                            <!-- FORMULARIO PARA EDITAR UNA LECCION -->
                            @if ($lesson_id)
                                <form wire:submit.prevent="update">
                                    <div class="form-group my-2">
                                        <label for="name">Nombre:</label>
                                        <input wire:model="name" class="form-control" placeholder="nombre de la leccion"
                                            type="text" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="url">URL:</label>
                                        <input wire:model="url" class="form-control" placeholder="url" type="text" />
                                        @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="section_id">Seccion</label>
                                        <select wire:model="section_id" class="form-select">
                                            @foreach ($sections as $section)
                                                <option class="bg-dark text-white" value="{{ $section->id }}">
                                                    {{ $section->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-outline-primary mt-2 w-100">Actualizar</button>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA EDITAR UNA LECCION -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fondo-general">
                            <h2 class="lead text-white">Lecciones del curso: {{ $course->title }}</h2>
                        </div>
                        <div class="card-body">
                            {{-- INPRIMIENDO LAS SECCIONES DE LOS CURSOS --}}
                            <div class="accordion accordion-flush" id="accordionFlushExample"
                                style="max-height: 500px; overflow-y: auto;">
                                @foreach ($course->sections as $section)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading{{ $section->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $section->id }}"
                                                aria-expanded="false"
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
                                                        <li class="d-flex justify-content-between gap-2 mb-2">
                                                            {{-- NOMBRE DE LA LECCION --}}
                                                            <a style="margin-top: 2px"
                                                                class="cursor-status">{{ $lesson->name }}
                                                            </a>

                                                            <div>
                                                                <button wire:click="edit({{ $lesson->id }})"
                                                                    class="btn btn-info btn-sm"> <i
                                                                        class='bx bx-edit-alt bx-tada'></i></button>
                                                                <button wire:click="delete({{ $lesson->id }})"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class='bx bx-message-alt-x bx-burst'></i></button>
                                                            </div>
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
                </div>
            </div>


        </div>
</div>
</section>
</div>

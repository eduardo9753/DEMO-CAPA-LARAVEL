<div>
    {{-- Be like water. --}}
    <section>
        <div class="">
            <h1 class="lead">Secciones del Curso</h1>
            <div class="row">
                <div class="col-md-4">
                    {{-- LLAMADA DEL COMPONENTE ASIDE --}}
                    @component('components.instructor.aside')
                        {{-- Puedes pasar datos al componente si es necesario --}}
                        @slot('course', $course)
                    @endcomponent

                    <div class="card mt-3">
                        <div class="card-body">
                            <!-- FORMULARIO PARA CREAR UNA SECCION DEL CURSO -->
                            @if (!$section_id)
                                <form wire:submit.prevent="create">
                                    <div class="form-group my-2">
                                        <label for="">Agregar nueva Sección:</label>
                                        <input wire:model="titulo" type="text" class="form-control"
                                            placeholder="Ingrese el nombre de la sección">
                                        @error('titulo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 mt-2">Crear</button>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA CREAR UNA SECCION DEL CURSO -->


                            <!-- FORMULARIO PARA EDITAR UNA SECCION DEL CURSO -->
                            @if ($section_id)
                                <form wire:submit.prevent="update">
                                    <div class="form-group my-2">
                                        <label for="">Editar la Sección:</label>
                                        <input wire:model="titulo" type="text" class="form-control"
                                            placeholder="Ingrese el nuevo nombre">
                                        @error('titulo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success w-100 mt-2">Actualizar</button>
                                        </div>
                                        <div class="col-md-6"> <button wire:click="resetInputFields"
                                                class="btn btn-warning w-100 mt-2">Cancelar</button></div>
                                    </div>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA EDITAR UNA SECCION DEL CURSO -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card sombra">
                        <div class="card-header fondo-general">
                            <h2 class="lead text-white">secciones del curso: {{ $course->title }}</h2>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SECTION</th>
                                        <th class="text-center">
                                            <i class='bx bx-edit-alt bx-tada'></i>
                                        </th>
                                        <th class="text-center">
                                            <i class='bx bx-message-alt-x bx-burst'></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course->sections as $section)
                                        <tr>
                                            <td>{{ $section->id }}</td>
                                            <td>{{ $section->titulo }}</td>
                                            <td class="text-center">
                                                <button wire:click="edit({{ $section->id }})"
                                                    class="btn btn-info btn-sm"><i
                                                        class='bx bx-edit-alt bx-tada'></i></button>
                                            </td>
                                            <td class="text-center">
                                                <button wire:click="delete({{ $section->id }})"
                                                    class="btn btn-danger btn-sm"><i
                                                        class='bx bx-message-alt-x bx-burst'></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

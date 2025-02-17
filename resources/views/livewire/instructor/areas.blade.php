<div>
    {{-- Be like water. --}}
    <section>
        <div class="">
            <h1 class="lead">Lista de Areas</h1>
            <div class="row">
                <div class="col-md-4">


                    <div class="card">
                        <div class="card-body">
                            <!-- FORMULARIO PARA CREAR UNA META DEL CURSO -->
                            @if (!$area_id)
                                <form wire:submit.prevent="create">
                                    <div class="form-group my-2">
                                        <label for="" class="my-2">Agregar nueva Area:</label>
                                        <input wire:model="name" type="text" class="form-control"
                                            placeholder="Ingrese el nombre del requerimiento">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 mt-2">Crear</button>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA CREAR UNA META DEL CURSO -->


                            <!-- FORMULARIO PARA EDITAR UNA META DEL CURSO -->
                            @if ($area_id)
                                <form wire:submit.prevent="update">
                                    <div class="form-group my-2">
                                        <label for="" class="my-2">Area actual:</label>
                                        <input wire:model="name" type="text" class="form-control"
                                            placeholder="Ingrese el nombre de la meta">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="btn btn-warning w-100 mt-2">Actualizar</button>
                                </form>
                            @endif
                            <!-- FORMULARIO PARA EDITAR UNA META DEL CURSO -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card sombra">
                        <div class="card-header fondo-general">
                            <h2 class="lead text-white">Tabla  de Areas</h2>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>AREA</th>
                                        <th>
                                            <i class='bx bx-edit-alt bx-tada'></i>
                                        </th>
                                        <th>
                                            <i class='bx bx-message-alt-x bx-burst'></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td>{{ $area->id }}</td>
                                            <td>{{ $area->name }}</td>
                                            <td>
                                                <button wire:click="edit({{ $area->id }})"
                                                    class="btn btn-info btn-sm"><i
                                                        class='bx bx-edit-alt bx-tada'></i></button>
                                            </td>
                                            <td>
                                                <button wire:click="delete({{ $area->id }})"
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

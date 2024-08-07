<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent='create'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="my-2">Cursos</label>
                                <select wire:model="course_id" class="form-select">
                                    @foreach ($courses as $course)
                                        <option class="text-bg-dark" value="{{ $course->id }}">{{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="my-2">Lista de areas para asignar</label>
                                <select wire:model="area_id" class="form-select">
                                    @foreach ($areas as $area)
                                        <option class="text-bg-dark" value="{{ $area->id }}">{{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <input type="submit" class="btn btn-success w-100 mt-3"
                                value="Asigar curso al area escogida">
                        </div>
                    </div>
                </form>

                <div class="card-body table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CURSO</th>
                                <th>SE ENCUENTRA EN ESTAS AREAS</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coursesTable as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>
                                        @foreach ($course->areas as $area)
                                            <div class="d-flex justify-content-between">
                                                <p>{{ $area->name }}</p>
                                                <div>
                                                    <button
                                                        wire:click="deleteArea({{ $course->id }}, {{ $area->id }})"
                                                        type="button" class="btn btn-danger">X</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('alert', (message, type) => {
                    Swal.fire({
                        position: "top-end",
                        icon: type,
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

                Livewire.on('confirmDelete', (message, type, courseId, areaId) => {
                    Swal.fire({
                        title: message,
                        text: "¡No podrás revertir esto!",
                        icon: type,
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('Emitiendo confirmDeleteCourseArea con:', courseId, areaId);
                            Livewire.emit('confirmDeleteCourseArea', courseId,
                                areaId); // Método de eliminación
                        }
                    });
                });
            });
        </script>
    @endsection




</div>

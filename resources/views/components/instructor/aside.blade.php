<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <aside class="">
        <ul class="list-group z-index">
            <li class="list-group-item">
                <a class=""
                    href="{{ route('instructor.course.edit', ['course' => $course]) }}">Informacion
                    del curso</a>
            </li>
            <li class="list-group-item">
                <a class=""
                    href="{{ route('instructor.section.index', ['course' => $course]) }}">Secciones
                    del curso</a>
            </li>

            <li class="list-group-item">
                <a class=""
                    href="{{ route('instructor.lesson.index', ['course'=>$course]) }}">Lecciones
                    del curso</a>
            </li>
    

            <li class="list-group-item">
                @switch($course->status)
                    @case('inactivo')
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Publicar</button>
                        </form>
                    @break

                    @default
                        <button class="btn btn-success">Curso Publicado</button>
                @endswitch
            </li>
        </ul>
    </aside>
</div>

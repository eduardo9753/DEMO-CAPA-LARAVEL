
<?php
use App\Http\Controllers\Instructor\area\AreaController;
use App\Http\Controllers\Instructor\Course\CourseController;
use App\Http\Controllers\instructor\lesson\LessonController;
use App\Http\Controllers\instructor\section\SectionController;
use Illuminate\Support\Facades\Route;

//RUTA PARA EL ADMIN (CREAR OTRA ROUTE)
Route::get('/instructor/course/list', [CourseController::class, 'index'])->name('instructor.course.index');
Route::get('/instructor/course/create', [CourseController::class , 'create'])->name('instructor.course.create');
Route::post('/instructor/course/store', [CourseController::class , 'store'])->name('instructor.course.store');
Route::get('/instructor/course/edit/{course}', [CourseController::class, 'edit'])->name('instructor.course.edit');
Route::put('/instructor/course/update/{course}', [CourseController::class, 'update'])->name('instructor.course.update');
Route::get('/instructor/asignar/curso/area', [CourseController::class , 'asignar'])->name('instructor.course.asignar');


Route::get('/instructori/section/index/{course}', [SectionController::class, 'index'])->name('instructor.section.index');
Route::get('/instructor/lesson/index/{course}', [LessonController::class , 'index'])->name('instructor.lesson.index');
Route::get('/instructor/area/index', [AreaController::class , 'index'])->name('instructor.area.index');

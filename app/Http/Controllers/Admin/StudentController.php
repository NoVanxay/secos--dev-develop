<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ClassRoom;
use App\Models\Role;
use App\Models\School;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\CsvImportTrait;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Student::with(['classroom', 'school', 'roles'])->select(sprintf('%s.*', (new Student)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'student_show';
                $editGate      = 'student_edit';
                $deleteGate    = 'student_delete';
                $crudRoutePart = 'students';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('st_code', function ($row) {
                return $row->st_code ? $row->st_code : "";
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : "";
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : "";
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Student::GENDER_RADIO[$row->gender] : '';
            });

            $table->editColumn('village', function ($row) {
                return $row->village ? $row->village : "";
            });
            $table->editColumn('district', function ($row) {
                return $row->district ? $row->district : "";
            });
            $table->editColumn('province', function ($row) {
                return $row->province ? Student::PROVINCE_SELECT[$row->province] : '';
            });
            $table->editColumn('father_name', function ($row) {
                return $row->father_name ? $row->father_name : "";
            });
            $table->editColumn('father_no', function ($row) {
                return $row->father_no ? $row->father_no : "";
            });
            $table->editColumn('mother_name', function ($row) {
                return $row->mother_name ? $row->mother_name : "";
            });
            $table->editColumn('mother_no', function ($row) {
                return $row->mother_no ? $row->mother_no : "";
            });
            $table->addColumn('classroom_class_room', function ($row) {
                return $row->classroom ? $row->classroom->class_room : '';
            });

            $table->addColumn('school_school', function ($row) {
                return $row->school ? $row->school->school : '';
            });

            $table->editColumn('end_from', function ($row) {
                return $row->end_from ? $row->end_from : "";
            });

            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('phone_no', function ($row) {
                return $row->phone_no ? $row->phone_no : "";
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

          /*   $table->editColumn('email.email', function ($row) {
                return $row->email ? (is_string($row->email) ? $row->email : $row->email->email) : '';
            }); */
            $table->addColumn('roles_title', function ($row) {
                return $row->roles ? $row->roles->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'classroom', 'school',  'photo',  'roles']);

            return $table->make(true);
        }

        return view('admin.students.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classrooms = ClassRoom::all()->pluck('class_room', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schools = School::all()->pluck('school', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.students.create', compact('classrooms', 'schools',  'roles'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());

        if ($request->input('photo', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $student->id]);
        }

        return redirect()->route('admin.students.index');
    }

    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classrooms = ClassRoom::all()->pluck('class_room', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schools = School::all()->pluck('school', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $student->load('classroom', 'school',  'roles');

        return view('admin.students.edit', compact('classrooms', 'schools', 'roles', 'student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        if ($request->input('photo', false)) {
            if (!$student->photo || $request->input('photo') !== $student->photo->file_name) {
                if ($student->photo) {
                    $student->photo->delete();
                }

                $student->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($student->photo) {
            $student->photo->delete();
        }

        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->load('classroom', 'school', 'roles');

        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('student_create') && Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Student();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

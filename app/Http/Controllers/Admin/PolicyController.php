<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPolicyRequest;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Policy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\CsvImportTrait;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PolicyController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Policy::query()->select(sprintf('%s.*', (new Policy)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'policy_show';
                $editGate      = 'policy_edit';
                $deleteGate    = 'policy_delete';
                $crudRoutePart = 'policies';

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
            $table->editColumn('policy', function ($row) {
                return $row->policy ? '<a href="' . $row->policy->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('lavel_no', function ($row) {
                return $row->lavel_no ? $row->lavel_no : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'policy']);

            return $table->make(true);
        }

        return view('admin.policies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.create');
    }

    public function store(StorePolicyRequest $request)
    {
        $policy = Policy::create($request->all());

        if ($request->input('policy', false)) {
            $policy->addMedia(storage_path('tmp/uploads/' . $request->input('policy')))->toMediaCollection('policy');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $policy->id]);
        }

        return redirect()->route('admin.policies.index');
    }

    public function edit(Policy $policy)
    {
        abort_if(Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.edit', compact('policy'));
    }

    public function update(UpdatePolicyRequest $request, Policy $policy)
    {
        $policy->update($request->all());

        if ($request->input('policy', false)) {
            if (!$policy->policy || $request->input('policy') !== $policy->policy->file_name) {
                if ($policy->policy) {
                    $policy->policy->delete();
                }

                $policy->addMedia(storage_path('tmp/uploads/' . $request->input('policy')))->toMediaCollection('policy');
            }
        } elseif ($policy->policy) {
            $policy->policy->delete();
        }

        return redirect()->route('admin.policies.index');
    }

    public function show(Policy $policy)
    {
        abort_if(Gate::denies('policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.show', compact('policy'));
    }

    public function destroy(Policy $policy)
    {
        abort_if(Gate::denies('policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $policy->delete();

        return back();
    }

    public function massDestroy(MassDestroyPolicyRequest $request)
    {
        Policy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('policy_create') && Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Policy();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPolicyRequest;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Policy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PolicyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $policies = Policy::with(['media'])->get();

        return view('frontend.policies.index', compact('policies'));
    }

    public function create()
    {
        abort_if(Gate::denies('policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.policies.create');
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

        return redirect()->route('frontend.policies.index');
    }

    public function edit(Policy $policy)
    {
        abort_if(Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.policies.edit', compact('policy'));
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

        return redirect()->route('frontend.policies.index');
    }

    public function show(Policy $policy)
    {
        abort_if(Gate::denies('policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.policies.show', compact('policy'));
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

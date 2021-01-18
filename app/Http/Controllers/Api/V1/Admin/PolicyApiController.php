<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Http\Resources\Admin\PolicyResource;
use App\Models\Policy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PolicyApiController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PolicyResource(Policy::all());
    }

    public function store(StorePolicyRequest $request)
    {
        $policy = Policy::create($request->all());

        if ($request->input('policy', false)) {
            $policy->addMedia(storage_path('tmp/uploads/' . $request->input('policy')))->toMediaCollection('policy');
        }

        return (new PolicyResource($policy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Policy $policy)
    {
        abort_if(Gate::denies('policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PolicyResource($policy);
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

        return (new PolicyResource($policy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Policy $policy)
    {
        abort_if(Gate::denies('policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $policy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

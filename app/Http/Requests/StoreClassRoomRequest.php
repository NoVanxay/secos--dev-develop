<?php

namespace App\Http\Requests;

use App\Models\ClassRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClassRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_room_create');
    }

    public function rules()
    {
        return [
            'class_room' => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'schools.*'  => [
                'integer',
            ],
            'schools'    => [
                'required',
                'array',
            ],
        ];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file',
            'modelClass' => 'required',
            'field' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $attachment = $request->file->store('/', $request->disk ?? config('filesystem.local'));

        $url = Storage::disk($request->disk ?? config('filesystem.local'))->url($attachment);

        // TrixAttachment::create([
        //     'field' => $request->field,
        //     'attachable_type' => $request->modelClass,
        //     'attachment' => $attachment,
        //     'disk' => $request->disk ?? config('filesystem.local'),
        // ]);

        return response()->json(['url' => $url], Response::HTTP_CREATED);
    }
}

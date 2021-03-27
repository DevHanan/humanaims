<?php

namespace App\Http\Controllers\System;

use App\Models\Photo;

class PhotoController extends Controller
{
    //
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        $data = [
            'status' => 1,
            'msg' => 'تم الحذف بنجاح',
            'id' => $photo->id
        ];
        return response()->json($data, 200);
    }
}

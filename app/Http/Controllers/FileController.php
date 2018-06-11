<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function image($type, $file_id)
    {
        if ($type == 'profile-pict') {
            return response()->file(
                storage_path('app/'.config('central.path.avatars').'/'.$file_id)
            );
        }
    }
}

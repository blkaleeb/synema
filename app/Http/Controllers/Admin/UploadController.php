<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request, $folder)
    {
        $createdAt = Carbon::now()->format('d-m-Y');
        $file = $request->file('images', []);
        foreach ($file as $data) {
            $filename = $createdAt . '_' . $data->getClientOriginalName();
            $data->storeAs('public/images/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
        }

        $response = str_replace('"', '', $folder . '/' . $createdAt . '_' . $file[0]->getClientOriginalName());

        return response()->json($response, 200)->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }

    public function delete(Request $request)
    {

        $imagePath = str_replace('"', '', $request->getContent());

        unlink(storage_path('app/public/images/' . $imagePath));
        $temporaryFile = TemporaryFile::where('filename', substr($imagePath, strpos($imagePath, "/") + 1))->first();
        $temporaryFile->delete();

        return response()->json('Berhasil revert file', 200)->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
}

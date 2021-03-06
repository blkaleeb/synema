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
        if ($folder == 'articles' || $folder == 'banner' || $folder == 'artists') {
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
        } else {
            if ($request->file('images', []) == null) {
                $createdAt = Carbon::now()->format('d-m-Y');
                $file = $request->file('thumbnail', []);
                foreach ($file as $data) {
                    $filename = $createdAt . '_' . $data->getClientOriginalName();
                    $data->storeAs('public/' . $folder . '/thumbnail', $filename);

                    TemporaryFile::create([
                        'folder' => $folder,
                        'filename' => $filename
                    ]);
                }
                $response = str_replace('"', '', $folder . '/' . $createdAt . '_' . $file[0]->getClientOriginalName());
            } else {
                $createdAt = Carbon::now()->format('d-m-Y');
                $file = $request->file('images', []);
                foreach ($file as $data) {
                    $filename = $createdAt . '_' . $data->getClientOriginalName();
                    $data->storeAs('public/' . $folder, $filename);

                    TemporaryFile::create([
                        'folder' => $folder,
                        'filename' => $filename
                    ]);
                }
                $response = str_replace('"', '', $folder . '/' . $createdAt . '_' . $file[0]->getClientOriginalName());
            }
        }


        return response()->json($response, 200)->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }

    public function delete(Request $request)
    {
        $imagePath = str_replace('"', '', $request->getContent());

        // dd($imagePath);
        $x = explode('/', $imagePath);
        $y = explode('.', $x[1]);
        $folder = $x[0];
        $fileType = substr($imagePath, -3);
        // dd($fileType);

        if ($folder == 'songs') {
            if ($fileType == 'jpg' || $fileType == 'jpe' || $fileType == 'png' || $fileType == 'HEIC') {
                $unlink = $x[1];
                // dd($imagePath);
                unlink(storage_path('app/public/songs/thumbnail/' . $unlink));
                $temporaryFile = TemporaryFile::where('filename', substr($imagePath, strpos($imagePath, "/") + 1))->first();
                $temporaryFile->delete();
            } else {
                unlink(storage_path('app/public/' . $imagePath));
                $temporaryFile = TemporaryFile::where('filename', substr($imagePath, strpos($imagePath, "/") + 1))->first();
                $temporaryFile->delete();
            }
        } else {
            unlink(storage_path('app/public/images/' . $imagePath));
            $temporaryFile = TemporaryFile::where('filename', substr($imagePath, strpos($imagePath, "/") + 1))->first();
            $temporaryFile->delete();
        }

        return response()->json('Berhasil revert file', 200)->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
}

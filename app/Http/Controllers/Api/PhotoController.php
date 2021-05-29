<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PhotoController extends Controller
{
    public function store(StorePhotoRequest $request): JsonResponse
    {
        $file = $request->file('photo');
        $filenameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileExtension = $file->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;

        $path = $file->storeAs('public/photos', $fileNameToStore);

        $photo = Photo::create([
            'name' => $fileNameToStore,
            'path' => $path,
        ]);

        return response()->json([
            'photo' => $photo
        ], Response::HTTP_CREATED);
    }

    public function destroy(Photo $photo): JsonResponse
    {
        if (!Storage::exists($photo->path)) {
            return response()->json([
                'error' => 'Photo does not exist.'
            ], Response::HTTP_NOT_FOUND);
        }

        Storage::delete($photo->path);

        $photo->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

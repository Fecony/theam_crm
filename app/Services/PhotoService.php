<?php

namespace App\Services;

use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PhotoService
{
    public function uploadPhoto($file)
    {
        $fileName = $this->getFileNameToStore($file);

        $path = $file->storeAs('public/photos', $fileName);

        return Photo::create([
            'name' => $fileName,
            'path' => $path,
        ]);
    }

    /**
     * @param  Photo  $photo
     * @return bool|JsonResponse|null
     */
    public function destroy(Photo $photo)
    {
        if (!Storage::exists($photo->path)) {
            return false;
        }

        Storage::delete($photo->path);

        return $photo->delete();
    }

    public function getFileNameToStore(UploadedFile $file): string
    {
        $filenameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileExtension = $file->getClientOriginalExtension();

        return $fileName . '_' . time() . '.' . $fileExtension;
    }
}

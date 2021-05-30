<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Photos endpoint
 *
 * Endpoint used to manage photos
 */
class PhotoController extends Controller
{
    /**
     * @bodyParam photo file required The image.
     *
     * @response status=201 scenario=success {
     *  "photo": {
     *   "name": "lpSHaesceD8_1622373059.jpg",
     *   "path": "public/photos/lpSHaesceD8_1622373059.jpg",
     *   "updated_at": "2021-05-30T11:10:59.000000Z",
     *   "created_at": "2021-05-30T11:10:59.000000Z",
     *   "id": 1
     * }
     *
     * @response status=422 scenario=error {
     *  "message": "The given data was invalid.",
     *  "errors": {
     *   "photo": [
     *     "The photo must be a file of type: png, jpg, jpeg."
     *   ]
     * }
     *
     * @param  StorePhotoRequest  $request
     * @return JsonResponse
     */
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

    /**
     * @urlParam photo int required Photo id to remove.
     *
     * @response status=204 scenario=success {}
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Photo  $photo
     * @return JsonResponse
     */
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

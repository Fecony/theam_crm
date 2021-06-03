<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Photo;
use App\Services\PhotoService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Photos endpoint
 *
 * Endpoint used to manage photos
 */
class PhotoController extends Controller
{
    /**
     * Upload photo
     *
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
     * @param  PhotoService  $photoService
     * @return JsonResponse
     */
    public function store(StorePhotoRequest $request, PhotoService $photoService): JsonResponse
    {
        $photo = $photoService->uploadPhoto($request->file('photo'));

        return response()->json([
            'photo' => $photo
        ], Response::HTTP_CREATED);
    }

    /**
     * Delete photo
     *
     * @urlParam photo int required Photo id to remove.
     *
     * @response status=204 scenario=success {}
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Photo  $photo
     * @param  PhotoService  $photoService
     * @return JsonResponse
     */
    public function destroy(Photo $photo, PhotoService $photoService): JsonResponse
    {
        $removedPhoto = $photoService->destroy($photo);

        if ($removedPhoto) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        }

        return response()->json([
            'error' => 'Photo does not exist.'
        ], Response::HTTP_NOT_FOUND);
    }
}

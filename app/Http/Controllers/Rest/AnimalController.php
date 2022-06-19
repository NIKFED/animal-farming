<?php

namespace App\Http\Controllers\Rest;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimalController extends BaseRestController
{
    /**
     * @var Request
     */
    protected Request $request;
    /**
     * @var Animal
     */
    protected Model $model;

    /**
     * @param Request $request
     * @param Animal $model
     */
    public function __construct(
        Request $request,
        Animal $model
    )
    {
        $this->request = $request;
        $this->model = $model;
    }

    protected function performIndex($user): JsonResponse
    {
        $animals = $this->model->query()->get();

        return $this->respond(AnimalResource::collection($animals));
    }

    protected function performStore($resource): JsonResponse
    {
        $resource->save();

        return $this->respond(new AnimalResource($resource));
    }

    protected function performShow($resource): JsonResponse
    {
        return $this->respond(new AnimalResource($resource));
    }

    protected function performUpdate($resource): JsonResponse
    {
        $resource->save();
        return $this->respond(new AnimalResource($resource));
    }

    protected function performDestroy($resource): JsonResponse
    {
        // Not implemented
    }
}

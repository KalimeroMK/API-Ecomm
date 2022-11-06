<?php

namespace Modules\Product\Http\Controllers\Api;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Banner\Http\Requests\Api\Search;
use Modules\Banner\Http\Requests\Api\Store;
use Modules\Banner\Http\Requests\Api\Update;
use Modules\Core\Helpers\Helper;
use Modules\Core\Http\Controllers\Api\CoreController;
use Modules\Product\Http\Resources\ProductResource;
use Modules\Product\Models\Product;
use Modules\Product\Service\ProductService;

class ProductController extends CoreController
{
    
    private ProductService $product_service;
    
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
        $this->authorizeResource(Product::class);
    }
    
    /**
     * @param  Search  $request
     *
     * @return ResourceCollection
     */
    public function index(Search $request): ResourceCollection
    {
        return ProductResource::collection($this->product_service->findAll($request->validated()));
    }
    
    /**
     *
     * @param  Store  $request
     *
     * @return JsonResponse|string
     */
    public function store(Store $request): JsonResponse|string
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.storeSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->product_service->product_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new ProductResource($this->product_service->store($request->validated())));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * @param $id
     *
     * @return JsonResponse|string
     */
    public function show($id): JsonResponse|string
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.ok',
                        [
                            'resource' => Helper::getResourceName(
                                $this->product_service->product_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new ProductResource($this->product_service->show($id)));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * JsonResponse
     *
     * @param  Update  $request
     * @param $id
     *
     * @return JsonResponse|string
     */
    public function update(Update $request, $id): JsonResponse|string
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.updateSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->product_service->product_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new ProductResource($this->product_service->update($id, $request->validated())));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * @param $id
     *
     * @return JsonResponse|string
     */
    public function destroy($id): JsonResponse|string
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.deleteSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->product_service->product_repository->model
                            ),
                        ]
                    )
                )
                ->respond($this->product_service->destroy($id));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}

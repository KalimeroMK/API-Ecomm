<?php

namespace Modules\Order\Http\Controllers\Api;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Banner\Http\Resource\BannerResource;
use Modules\Core\Helpers\Helper;
use Modules\Core\Http\Controllers\Api\CoreController;
use Modules\Order\Http\Resources\OrderResource;
use Modules\Order\Models\Order;
use Modules\Order\Service\OrderService;
use Modules\Post\Http\Requests\Api\Search;
use Modules\Post\Http\Requests\Api\Store;
use Modules\Post\Http\Requests\Api\Update;
use Modules\Product\Exceptions\SearchException;

class OrderController extends CoreController
{
    
    private OrderService $order_service;
    
    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
        $this->authorizeResource(Order::class);
    }
    
    /**
     * @param  Search  $request
     *
     * @return ResourceCollection
     * @throws SearchException
     */
    public function index(Search $request): ResourceCollection
    {
        return OrderResource::collection($this->order_service->getAll($request->validated()));
    }
    
    /**
     *
     * @return mixed
     * @throws Exception
     */
    public function store(Store $request)
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.storeSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->order_service->order_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new BannerResource($this->order_service->store($request->validated())));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * @param $id
     *
     * @return JsonResponse|string
     */
    public function show($id)
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.ok',
                        [
                            'resource' => Helper::getResourceName(
                                $this->order_service->order_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new BannerResource($this->order_service->show($id)));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * @param  Update  $request
     * @param  $id
     *
     * @return JsonResponse|string
     */
    public function update(Update $request, $id)
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.updateSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->order_service->order_repository->model
                            ),
                        ]
                    )
                )
                ->respond(new OrderResource($this->order_service->update($id, $request->validated())));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * @param  int  $id
     *
     * @return JsonResponse|string
     */
    public function destroy(int $id)
    {
        try {
            return $this
                ->setMessage(
                    __(
                        'apiResponse.deleteSuccess',
                        [
                            'resource' => Helper::getResourceName(
                                $this->order_service->order_repository->model
                            ),
                        ]
                    )
                )
                ->respond($this->order_service->destroy($id));
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}

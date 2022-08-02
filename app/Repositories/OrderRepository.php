<?php

namespace App\Repositories;

use App\Http\Resources\OrderResource;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll(): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::all());
    }

    public function getById($orderId): OrderResource
    {
        return new OrderResource(Order::query()->findOrFail($orderId));
    }

    public function create(array $orderDetails): OrderResource
    {
        return new OrderResource(Order::query()->create($orderDetails));
    }

    public function update($orderId, array $newDetails): OrderResource
    {
        $order = Order::query()->findOrFail($orderId);

        $order->update($newDetails);

        return new OrderResource($order);
    }

    public function delete($orderId)
    {
        Order::destroy($orderId);
    }
}

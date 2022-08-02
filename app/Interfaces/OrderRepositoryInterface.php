<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function getAll();

    public function getById($orderId);

    public function create(array $orderDetails);

    public function update($orderId, array $newDetails);

    public function delete($orderId);
}

<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
    public function getUserCartProducts($userId);
    public function addProduct($productId, $qnty, $userId);
    public function updateProductQuantity($productId, $qnty, $userId);
    public function deleteProduct($productId, $userId);
}

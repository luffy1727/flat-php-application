<?php

namespace Boozt\Service;

use Boozt\Database\Repository\CustomerRepository;
use Boozt\Database\Repository\OrderItemRepository;
use Boozt\Database\Repository\OrderRepository;
use DateTime;

class AnalyticService
{
    private $customerRepository;

    private $orderRepository;

    private $orderItemRepository;

    public function __construct($db)
    {
        $this->customerRepository = new CustomerRepository($db);
        $this->orderRepository = new OrderRepository($db);
        $this->orderItemRepository = new OrderItemRepository($db);
    }

    public function findCountNumbers()
    {
        $response['customerCount'] = $this->customerRepository->findCount();
        $response['orderCount'] = $this->orderRepository->findCount();
        $response['totalRevenue'] = 0;
        $orderItems = $this->orderItemRepository->findAll();

        foreach ($orderItems as $item) {
            $response['totalRevenue'] += $item['quantity'] * $item['price'];
        }

        return $response;
    }

    public function findGraphNumbers($params)
    {
        $today = new DateTime();
        if (!array_key_exists('to', $params) || !$params['to']) {
            $params['to'] = new DateTime();
        } else {
            $params['to'] = DateTime::createFromFormat('Y-m-d', $params['to']);
        }
        if (!array_key_exists('from', $params)) {
            $begin = clone $today;
            $begin->modify('-30 day');
            $params['from'] = $begin;
        } else {
            $params['from'] = DateTime::createFromFormat('Y-m-d', $params['from']);
        }
        $response['customerData']= $this->customerRepository->findBetweenTimeFrames($params['from'], $params['to']);
        $response['orderData']= $this->orderRepository->findBetweenTimeFrames($params['from'], $params['to']);

        return $response;
    }
}

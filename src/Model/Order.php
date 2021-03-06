<?php

namespace Boozt\Model;

use Exception;

class Order
{
    private $id;

    private $purchaseDate;

    private $country;

    private $device;

    private $orderItems;

    private $customer;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param $purchaseDate
     * @return $this
     * @throws Exception
     */
    public function setPurchaseDate($purchaseDate)
    {
        if ($purchaseDate > new \DateTime()) {
            throw new Exception();
        }

        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getDevice()
    {
        return $this->device;
    }

    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }
}

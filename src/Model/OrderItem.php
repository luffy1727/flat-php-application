<?php

namespace Boozt\Model;

class OrderItem
{
    private $id;

    private $EAN;

    private $quantity;

    private $price;

    private $order;

    public function getId()
    {
        return $this->id;
    }

    public function getEAN()
    {
        return $this->EAN;
    }

    public function setEAN($EAN)
    {
        $this->EAN = $EAN;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}

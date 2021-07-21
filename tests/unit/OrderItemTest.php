<?php declare(strict_types=1);

use Boozt\Model\Customer;
use Boozt\Model\Order;
use Boozt\Model\OrderItem;
use PHPUnit\Framework\TestCase;

final class OrderItemTest extends TestCase
{
    public function testOrderItemGetters(): void
    {
        $customer = new Customer();
        $order = new Order();
        $order->setCustomer($customer);
        $order->setDevice('Iphone');

        $orderItem = new OrderItem();

        $orderItem->setEAN(1123124124);
        $orderItem->setOrder($order);
        $orderItem->setPrice(1231.4);
        $orderItem->setQuantity(3);

        $this->assertEquals(1123124124, $orderItem->getEAN());
        $this->assertEquals(1231.4, $orderItem->getPrice());
        $this->assertEquals(3, $orderItem->getQuantity());
        $this->assertEquals('Iphone', $orderItem->getOrder()->getDevice());
    }
}
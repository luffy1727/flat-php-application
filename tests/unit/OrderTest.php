<?php declare(strict_types=1);

use Boozt\Model\Customer;
use Boozt\Model\Order;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{
    public function testOrderGetters(): void
    {
        $today = new DateTime();
        $begin = clone $today;
        $begin->modify('-30 day');

        $customer = new Customer();
        $customer->setFirstName('Chintushig');

        $order = new Order();
        $order->setCountry('Mongolia');
        $order->setPurchaseDate($begin);
        $order->setCustomer($customer);
        $order->setDevice('MacBook');

        $this->assertEquals('Mongolia', $order->getCountry());
        $this->assertEquals('Chintushig', $order->getCustomer()->getFirstName());
        $this->assertEquals('MacBook', $order->getDevice());
        $this->assertEquals($begin, $order->getPurchaseDate());
    }

    public function testPurchaseDateException(): void
    {
        $today = new DateTime();
        $order = new Order();
        $begin = clone $today;
        $begin->modify('+30 day');
        $this->expectException(Exception::class);
        $order->setPurchaseDate($begin);
    }
}
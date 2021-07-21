<?php declare(strict_types=1);

use Boozt\Model\Customer;
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    public function testCustomerGetters(): void
    {
        $customer = new Customer();
        $customer->setFirstName('Chintushig');
        $customer->setLastName('Ochirsukh');
        $customer->setEmail('tushig.tushig@gmail.com');

        $this->assertEquals('tushig.tushig@gmail.com', $customer->getEmail());
        $this->assertEquals('Chintushig', $customer->getFirstName());
        $this->assertEquals('Ochirsukh', $customer->getLastName());
    }
}
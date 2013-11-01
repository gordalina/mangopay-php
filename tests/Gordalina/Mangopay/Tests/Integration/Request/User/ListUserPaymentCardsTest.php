<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\PaymentCard;

use Gordalina\Mangopay\Request\User\ListUserPaymentCards;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class ListUserPaymentCardsTest extends MangopayTestCase
{
    public function testFetch()
    {
        $user = $this->createUser();
        $paymentCard = $this->createPaymentCard($user);

        $response = $this->getClient()->request(new ListUserPaymentCards($user->getID()));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $collection = $response->getCollection();

        $this->assertTrue(is_array($collection));
        $this->assertCount(0, $collection);

        // in test the payment cards are not associated with the user
    }
}

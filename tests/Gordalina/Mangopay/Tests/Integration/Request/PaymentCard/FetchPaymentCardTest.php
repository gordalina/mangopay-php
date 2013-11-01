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

use Gordalina\Mangopay\Model\PaymentCard;
use Gordalina\Mangopay\Request\PaymentCard\FetchPaymentCard;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class FetchPaymentCardTest extends MangopayTestCase
{
    public function testFetch()
    {
        $user = $this->createUser();
        $entity = $this->createPaymentCard($user);

        $response = $this->getClient()->request(new FetchPaymentCard($entity->getID()));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseEntity = $response->getModel();

        $this->assertFalse($entity === $responseEntity);
        $this->assertSame($entity->getOwnerID(), $responseEntity->getOwnerID());
        $this->assertSame($entity->getReturnURL(), $responseEntity->getReturnURL());
        $this->assertNotNull($responseEntity->getRedirectURL());
        $this->assertNull($responseEntity->getCardNumber());
        $this->assertNull($responseEntity->getTemplateURL());

        $this->assertGreaterThan(0, $responseEntity->getID());
        $this->assertNull($entity->getTag());
    }
}

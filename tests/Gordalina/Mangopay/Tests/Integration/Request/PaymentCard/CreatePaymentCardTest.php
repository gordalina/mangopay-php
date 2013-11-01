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
use Gordalina\Mangopay\Request\PaymentCard\CreatePaymentCard;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class CreatePaymentCardTest extends MangopayTestCase
{
    public function testRequiredFields()
    {
        $user = $this->createUser();

        $entity = new PaymentCard();
        $entity->setReturnURL('http://inpakt.com/ok');
        $entity->setOwnerID($user->getID());

        $response = $this->getClient()->request(new CreatePaymentCard($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        $responseEntity = $response->getModel();
        $this->assertFalse($entity === $responseEntity);
        $this->assertSame($entity->getOwnerID(), $responseEntity->getOwnerID());
        $this->assertSame(sprintf('%s?PaymentCardID=%s', $entity->getReturnURL(), $responseEntity->getID()), $responseEntity->getReturnURL());
        $this->assertNotNull($responseEntity->getRedirectURL());
        $this->assertNull($responseEntity->getCardNumber());
        $this->assertNull($responseEntity->getTemplateURL());

        $this->assertGreaterThan(0, $responseEntity->getID());
        $this->assertNull($entity->getTag());

        // These values are completely erronous
        // $this->assertGreaterThan(0, $responseEntity->getCreationDate());
        // $this->assertGreaterThan(0, $responseEntity->getUpdateDate());
    }
}

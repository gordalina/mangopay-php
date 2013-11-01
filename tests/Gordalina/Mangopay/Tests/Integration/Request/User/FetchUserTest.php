<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\User;

use Gordalina\Mangopay\Model\User;
use Gordalina\Mangopay\Request\User\FetchUser;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class FetchUserTest extends MangopayTestCase
{
    public function testFetch()
    {
        $entity = $this->createUser();
        $id = $entity->getID();

        $response = $this->getClient()->request(new FetchUser($id));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseEntity = $response->getModel();

        $this->assertFalse($entity === $responseEntity);
        $this->assertSame($entity->getEmail(), $responseEntity->getEmail());
        $this->assertSame($entity->getFirstName(), $responseEntity->getFirstName());
        $this->assertSame($entity->getLastName(), $responseEntity->getLastName());
        $this->assertSame($entity->getIP(), $responseEntity->getIP());
        $this->assertSame($entity->getBirthday(), $responseEntity->getBirthday());
        $this->assertSame($entity->getPersonType(), $responseEntity->getPersonType());
        $this->assertSame($entity->getNationality(), $responseEntity->getNationality());

        $this->assertGreaterThan(0, $responseEntity->getID());
        $this->assertGreaterThan(0, $responseEntity->getCreationDate());
        $this->assertFalse($responseEntity->getHasRegisteredMeansOfPayment());
        $this->assertFalse($responseEntity->getCanRegisterMeanOfPayment());
        $this->assertSame(0, $responseEntity->getPersonalWalletAmount());
        $this->assertFalse($responseEntity->getIsStrongAuthenticated());
    }
}

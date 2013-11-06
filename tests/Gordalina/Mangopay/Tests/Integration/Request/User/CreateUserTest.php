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
use Gordalina\Mangopay\Request\User\CreateUser;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class CreateUserTest extends MangopayTestCase
{
    public function testRequiredFields()
    {
        $entity = new User();
        $entity->setEmail('example@domain.com');
        $entity->setFirstName('John');
        $entity->setLastName('Doe');
        $entity->setIP('127.0.0.1');
        $entity->setBirthday(new \DateTime('1980-10-31'));
        $entity->setNationality('US');
        $entity->setPersonType(User::NATURAL_PERSON);

        $response = $this->getClient()->request(new CreateUser($entity));
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

    public function testNegativeBirthdate()
    {
        $entity = new User();
        $entity->setEmail('example@domain.com');
        $entity->setFirstName('John');
        $entity->setLastName('Doe');
        $entity->setIP('127.0.0.1');
        $entity->setBirthday(new \DateTime('1920-10-31'));
        $entity->setNationality('US');
        $entity->setPersonType(User::NATURAL_PERSON);

        $response = $this->getClient()->request(new CreateUser($entity));
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
    }
    public function testLegalPersonalityFields()
    {
        $entity = new User();
        $entity->setEmail('example@domain.com');
        $entity->setFirstName('John');
        $entity->setLastName('Doe');
        $entity->setIP('127.0.0.1');
        $entity->setBirthday(new \DateTime('1980-10-31'));
        $entity->setNationality('US');
        $entity->setPersonType(User::LEGAL_PERSONALITY);

        $response = $this->getClient()->request(new CreateUser($entity));
        var_dump($response);die;
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

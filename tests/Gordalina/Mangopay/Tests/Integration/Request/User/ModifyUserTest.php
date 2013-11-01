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
use Gordalina\Mangopay\Request\User\FetchUser;
use Gordalina\Mangopay\Request\User\ModifyUser;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class ModifyUserTest extends MangopayTestCase
{
    public function testFetch()
    {
        $user = new User();
        $user->setTag('no-tag');
        $user->setEmail('example@domain.com');
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setIP('127.0.0.1');
        $user->setBirthday(new \DateTime('1980-10-31'));
        $user->setNationality('US');
        $user->setPersonType(User::NATURAL_PERSON);

        $response = $this->getClient()->request(new CreateUser($user));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        $user = $response->getModel();
        $user->setTag('tag');
        $user->setEmail('doe@domain.com');
        $user->setFirstName('Joanne');
        $user->setLastName('Doanne');
        $user->setHasRegisteredMeansOfPayment(true);
        $user->setCanRegisterMeanOfPayment(true);
        $user->setIP('192.168.0.1');
        $user->setBirthday(new \DateTime('1981-10-31'));
        $user->setPassword('password');
        $user->setNationality('CA');
        $user->setPersonType(User::LEGAL_PERSONALITY);
        $user->setPersonalWalletAmount(1000);
        $user->setIsStrongAuthenticated(true);

        $response = $this->getClient()->request(new ModifyUser($user));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseUser = $response->getModel();

        $this->assertFalse($user === $responseUser);
        $this->assertSame($user->getTag(), $responseUser->getTag());
        $this->assertSame($user->getEmail(), $responseUser->getEmail());
        $this->assertSame($user->getFirstName(), $responseUser->getFirstName());
        $this->assertSame($user->getLastName(), $responseUser->getLastName());
        $this->assertFalse($responseUser->getHasRegisteredMeansOfPayment());
        $this->assertSame($user->getCanRegisterMeanOfPayment(), $responseUser->getCanRegisterMeanOfPayment());
        $this->assertSame($user->getIP(), $responseUser->getIP());
        $this->assertSame($user->getBirthday(), $responseUser->getBirthday());
        $this->assertSame($user->getPassword(), $responseUser->getPassword());
        $this->assertSame($user->getNationality(), $responseUser->getNationality());
        $this->assertSame(User::NATURAL_PERSON, $responseUser->getPersonType());
        $this->assertSame(0, $responseUser->getPersonalWalletAmount());
        $this->assertFalse($responseUser->getIsStrongAuthenticated());

        $id = $responseUser->getID();

        $response = $this->getClient()->request(new FetchUser($id));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseUser = $response->getModel();

        $this->assertSame($user->getTag(), $responseUser->getTag());
        $this->assertSame($user->getEmail(), $responseUser->getEmail());
        $this->assertSame($user->getFirstName(), $responseUser->getFirstName());
        $this->assertSame($user->getLastName(), $responseUser->getLastName());
        $this->assertFalse($responseUser->getHasRegisteredMeansOfPayment());
        $this->assertSame($user->getCanRegisterMeanOfPayment(), $responseUser->getCanRegisterMeanOfPayment());
        $this->assertSame($user->getIP(), $responseUser->getIP());
        $this->assertSame($user->getBirthday(), $responseUser->getBirthday());
        $this->assertSame($user->getPassword(), $responseUser->getPassword());
        $this->assertSame($user->getNationality(), $responseUser->getNationality());
        $this->assertSame(User::NATURAL_PERSON, $responseUser->getPersonType());
        $this->assertSame(0, $responseUser->getPersonalWalletAmount());
        $this->assertFalse($responseUser->getIsStrongAuthenticated());
    }
}

<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request;

use Gordalina\Mangopay\Model\PaymentCard;
use Gordalina\Mangopay\Model\User;
use Gordalina\Mangopay\Model\Wallet;
use Gordalina\Mangopay\Request\PaymentCard\CreatePaymentCard;
use Gordalina\Mangopay\Request\User\CreateUser;
use Gordalina\Mangopay\Request\Wallet\CreateWallet;
use Gordalina\Mangopay\Tests\Integration\IntegrationTestCase;

class MangopayTestCase extends IntegrationTestCase
{
    /**
     * @return User
     */
    protected function createUser()
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

        return $response->getModel();
    }

    /**
     * @param  User   $user defaults to null
     * @return Wallet
     */
    protected function createWallet($user = null)
    {
        if ($user === null) {
            $user = $this->createUser();
        }

        $entity = new Wallet();
        $entity->setOwners(array($user->getID()));
        $entity->setTag('tag');
        $entity->setName('wallet');
        $entity->setDescription('mangopay wallet');
        $entity->setRaisingGoalAmount(100);
        $entity->setContributionLimitDate(new \DateTime('+1 year'));

        $response = $this->getClient()->request(new CreateWallet($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        return $response->getModel();
    }

    /**
     * @param  User        $user defaults to null
     * @return PaymentCard
     */
    protected function createPaymentCard($user = null)
    {
        if ($user === null) {
            $user = $this->createUser();
        }

        $entity = new PaymentCard();
        $entity->setReturnURL('http://inpakt.com/ok');
        $entity->setOwnerID($user->getID());

        $response = $this->getClient()->request(new CreatePaymentCard($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        return $response->getModel();
    }
}

<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\Wallet;

use Gordalina\Mangopay\Model\Wallet;
use Gordalina\Mangopay\Request\Wallet\ListWalletUsers;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class ListWalletUsersTest extends MangopayTestCase
{
    public function testFetch()
    {
        $user = $this->createUser();
        $entity = $this->createWallet($user);
        $id = $entity->getID();

        $response = $this->getClient()->request(new ListWalletUsers($id));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $collection = $response->getCollection();

        $this->assertTrue(is_array($collection));
        $this->assertCount(1, $collection);
        $this->assertInstanceOf('Gordalina\Mangopay\Model\User', $collection[0]);

        $responseUser = $collection[0];
        $this->assertFalse($user === $responseUser);
    }

    public function testFetchOwners()
    {
        $user = $this->createUser();
        $entity = $this->createWallet($user);
        $id = $entity->getID();

        $response = $this->getClient()->request(new ListWalletUsers($id, ListWalletUsers::INCLUDE_OWNERS));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $collection = $response->getCollection();

        $this->assertTrue(is_array($collection));
        $this->assertCount(1, $collection);
        $this->assertInstanceOf('Gordalina\Mangopay\Model\User', $collection[0]);
    }

    public function testFetchContributors()
    {
        $user = $this->createUser();
        $entity = $this->createWallet($user);
        $id = $entity->getID();

        $response = $this->getClient()->request(new ListWalletUsers($id, ListWalletUsers::INCLUDE_CONTRIBUTORS));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $collection = $response->getCollection();

        $this->assertTrue(is_array($collection));
        $this->assertCount(0, $collection);
    }

    // Apparently the API does not accept this parameter
    //
    // public function testFetchRefunded()
    // {
    //     $user = $this->createUser();
    //     $entity = $this->createWallet($user);
    //     $id = $entity->getID();

    //     $response = $this->getClient()->request(new ListWalletUsers($id, ListWalletUsers::INCLUDE_REFUNDED));
    //     $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
    //     $this->assertTrue($response->isSuccessful());
    //     $collection = $response->getCollection();

    //     $this->assertTrue(is_array($collection));
    //     $this->assertCount(0, $collection);
    // }
}

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

use Gordalina\Mangopay\Request\User\ListUserWallets;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class ListUserWalletsTest extends MangopayTestCase
{
    public function testFetch()
    {
        $user = $this->createUser();
        $wallet = $this->createWallet($user);

        $response = $this->getClient()->request(new ListUserWallets($user->getID()));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $collection = $response->getCollection();

        $this->assertTrue(is_array($collection));
        $this->assertCount(1, $collection);
        $this->assertInstanceOf('Gordalina\Mangopay\Model\Wallet', $collection[0]);

        $responseWallet = $collection[0];
        $this->assertSame($wallet->getID(), $responseWallet->getID());
    }
}

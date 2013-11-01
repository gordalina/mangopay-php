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
use Gordalina\Mangopay\Request\Wallet\CreateWallet;
use Gordalina\Mangopay\Request\Wallet\FetchWallet;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class FetchWalletTest extends MangopayTestCase
{
    public function testFetch()
    {
        $entity = $this->createWallet();
        $id = $entity->getID();

        $response = $this->getClient()->request(new FetchWallet($id));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseEntity = $response->getModel();

        $this->assertFalse($entity === $responseEntity);
        $this->assertSame($entity->getOwners(), $responseEntity->getOwners());
        $this->assertSame($entity->getTag(), $responseEntity->getTag());
        $this->assertSame($entity->getName(), $responseEntity->getName());
        $this->assertSame($entity->getDescription(), $responseEntity->getDescription());
        $this->assertSame($entity->getRaisingGoalAmount(), $responseEntity->getRaisingGoalAmount());
        $this->assertSame($entity->getContributionLimitDate(), $responseEntity->getContributionLimitDate());

        $this->assertSame(0, $responseEntity->getCollectedAmount());
        $this->assertSame(0, $responseEntity->getSpentAmount());
        $this->assertSame(0, $responseEntity->getAmount());
    }
}

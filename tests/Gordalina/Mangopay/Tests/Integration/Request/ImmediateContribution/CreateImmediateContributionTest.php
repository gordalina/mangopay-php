<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\Contribution;

use Gordalina\Mangopay\Model\Contribution;
use Gordalina\Mangopay\Request\ImmediateContribution\CreateImmediateContribution;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class CreateImmediateContributionTest extends MangopayTestCase
{
    public function testRequiredFields()
    {
        $user = $this->createUser();
        $wallet = $this->createWallet();
        $card = $this->createPaymentCard($user);

        $entity = new Contribution();
        $entity->setUserID($user->getID());
        $entity->setWalletId($wallet->getID());
        $entity->setAmount(100);
        $entity->setPaymentCardID($card->getID());
        $entity->setCulture('en');

        $response = $this->getClient()->request(new CreateImmediateContribution($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);

        // the card is not valid
        $this->assertFalse($response->isSuccessful());
        $this->assertSame(400, $response->getStatusCode());
        $this->assertSame(sprintf('card %d is not active', $card->getID()), $response->getUserMessage());
    }
}

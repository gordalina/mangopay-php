<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\ContributionByWithdrawal;

use Gordalina\Mangopay\Model\ContributionByWithdrawal;
use Gordalina\Mangopay\Request\ContributionByWithdrawal\CreateContributionByWithdrawal;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class CreateContributionByWithdrawalTest extends MangopayTestCase
{
    public function testRequiredFields()
    {
        $user = $this->createUser();
        $wallet = $this->createWallet();

        $entity = new ContributionByWithdrawal();
        $entity->setUserID($user->getID());
        $entity->setAmountDeclared(1000);

        $response = $this->getClient()->request(new CreateContributionByWithdrawal($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
    }
}

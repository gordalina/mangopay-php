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
use Gordalina\Mangopay\Request\User\CreateUser;
use Gordalina\Mangopay\Request\Contribution\CreateContribution;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class CreateContributionTest extends MangopayTestCase
{
    public function testRequiredFields()
    {
        $user = $this->createUser();
        $wallet = $this->createWallet();

        $entity = new Contribution();
        $entity->setUserID($user->getID());
        $entity->setWalletId($wallet->getID());
        $entity->setAmount(1000);
        $entity->setReturnURL('http://inpakt.com/ok');
        $entity->setCulture('en');

        $response = $this->getClient()->request(new CreateContribution($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        $responseEntity = $response->getModel();
        $this->assertFalse($entity === $responseEntity);

        $this->assertSame($entity->getUserID(), $responseEntity->getUserID());
        $this->assertSame($entity->getWalletID(), $responseEntity->getWalletID());
        $this->assertSame($entity->getAmount(), $responseEntity->getAmount());
        $this->assertSame(sprintf('%s?ContributionID=%d', $entity->getReturnURL(), $responseEntity->getID()), $responseEntity->getReturnURL());
        $this->assertSame($entity->getCulture(), $responseEntity->getCulture());

        $this->assertSame(0, $responseEntity->getClientFeeAmount());
        $this->assertSame(0, $responseEntity->getLeetchiFeeAmount());
        $this->assertFalse($responseEntity->getIsCompleted());
        $this->assertFalse($responseEntity->getIsSucceeded());
        $this->assertGreaterThan(0, strlen($responseEntity->getPaymentURL()));
        $this->assertNull($responseEntity->getTemplateURL());
        $this->assertFalse($responseEntity->getRegisterMeanOfPayment());
        $this->assertNull($responseEntity->getError());
        $this->assertSame(0, $responseEntity->getPaymentCardID());
        $this->assertSame("Payline", $responseEntity->getType());
        $this->assertNull($responseEntity->getAnswerCode());
        $this->assertNull($responseEntity->getAnswerMessage());

        $this->assertGreaterThan(0, $responseEntity->getID());
        $this->assertGreaterThan(0, $responseEntity->getCreationDate());
        $this->assertGreaterThan(0, $responseEntity->getUpdateDate());
    }
}

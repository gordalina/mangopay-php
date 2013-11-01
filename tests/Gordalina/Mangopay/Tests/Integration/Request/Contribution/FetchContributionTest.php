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
use Gordalina\Mangopay\Request\Contribution\CreateContribution;
use Gordalina\Mangopay\Request\Contribution\FetchContribution;
use Gordalina\Mangopay\Tests\Integration\Request\MangopayTestCase;

class FetchContributionTest extends MangopayTestCase
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

        $entity = $response->getModel();

        $response = $this->getClient()->request(new FetchContribution($entity->getID()));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        $responseEntity = $response->getModel();
        $this->assertFalse($entity === $responseEntity);

        $this->assertSame($entity->getID(), $responseEntity->getID());
        $this->assertSame($entity->getCreationDate(), $responseEntity->getCreationDate());
        $this->assertSame($entity->getUpdateDate(), $responseEntity->getUpdateDate());
        $this->assertSame($entity->getUserID(), $responseEntity->getUserID());
        $this->assertSame($entity->getWalletID(), $responseEntity->getWalletID());
        $this->assertSame($entity->getAmount(), $responseEntity->getAmount());
        $this->assertSame($entity->getClientFeeAmount(), $responseEntity->getClientFeeAmount());
        $this->assertSame($entity->getLeetchiFeeAmount(), $responseEntity->getLeetchiFeeAmount());
        $this->assertSame($entity->getIsSucceeded(), $responseEntity->getIsSucceeded());
        $this->assertSame($entity->getIsCompleted(), $responseEntity->getIsCompleted());
        $this->assertSame($entity->getPaymentURL(), $responseEntity->getPaymentURL());
        $this->assertSame($entity->getTemplateURL(), $responseEntity->getTemplateURL());
        $this->assertSame($entity->getReturnURL(), $responseEntity->getReturnURL());
        $this->assertSame($entity->getRegisterMeanOfPayment(), $responseEntity->getRegisterMeanOfPayment());
        $this->assertSame($entity->getError(), $responseEntity->getError());
        $this->assertSame($entity->getPaymentCardID(), $responseEntity->getPaymentCardID());
        $this->assertSame($entity->getCulture(), $responseEntity->getCulture());
        $this->assertSame($entity->getType(), $responseEntity->getType());
        $this->assertSame($entity->getPaymentMethodType(), $responseEntity->getPaymentMethodType());
        $this->assertSame($entity->getAnswerCode(), $responseEntity->getAnswerCode());
        $this->assertSame($entity->getAnswerMessage(), $responseEntity->getAnswerMessage());

    }
}

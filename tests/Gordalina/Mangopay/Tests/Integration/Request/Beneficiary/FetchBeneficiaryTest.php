<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration\Request\Beneficiary;

use Gordalina\Mangopay\Model\Beneficiary;
use Gordalina\Mangopay\Request\Beneficiary\CreateBeneficiary;
use Gordalina\Mangopay\Request\Beneficiary\FetchBeneficiary;
use Gordalina\Mangopay\Tests\Integration\IntegrationTestCase;

class FetchBeneficiaryTest extends IntegrationTestCase
{
    public function testFetch()
    {
        $entity = new Beneficiary();
        $entity->setBankAccountOwnerName('Mark Zuckerberg');
        $entity->setBankAccountOwnerAddress('1 bis Cité Paradis, 75010 Paris');
        $entity->setBankAccountIBAN('FR3020041010124530725S03383');
        $entity->setBankAccountBIC('CRLYFRPP');

        $response = $this->getClient()->request(new CreateBeneficiary($entity));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());

        $responseEntity = $response->getModel();
        $id = $response->getModel()->getID();

        $response = $this->getClient()->request(new FetchBeneficiary($id));
        $this->assertInstanceOf('Gordalina\Mangopay\Response\ResponseInterface', $response);
        $this->assertTrue($response->isSuccessful());
        $responseEntity = $response->getModel();

        $responseEntity = $response->getModel();
        $this->assertFalse($entity === $responseEntity);

        $this->assertSame($id, $responseEntity->getID());
        $this->assertSame($entity->getBankAccountOwnerName(), $responseEntity->getBankAccountOwnerName());
        $this->assertSame($entity->getBankAccountOwnerAddress(), $responseEntity->getBankAccountOwnerAddress());
        $this->assertSame($entity->getBankAccountIBAN(), $responseEntity->getBankAccountIBAN());
        $this->assertSame($entity->getBankAccountBIC(), $responseEntity->getBankAccountBIC());

        $this->assertGreaterThan(0, $responseEntity->getCreationDate());
        $this->assertGreaterThan(0, $responseEntity->getUpdateDate());
        $this->assertNull($responseEntity->getTag());
        $this->assertSame(0, $responseEntity->getUserID());
    }
}

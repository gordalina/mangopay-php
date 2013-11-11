<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\Beneficiary;

use Gordalina\Mangopay\Model\Beneficiary;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateBeneficiary extends RequestModel implements RequestInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'POST';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return '/beneficiaries';
    }

    /**
     * @param  Beneficiary               $beneficiary
     * @throws \InvalidArgumentException If $beneficiary is not valid
     */
    public function __construct(Beneficiary $beneficiary)
    {
        if ($beneficiary->isValid() === false) {
            throw new \InvalidArgumentException("Beneficiary::isValid() returned false");
        }

        $this->setModel($beneficiary);
    }
}

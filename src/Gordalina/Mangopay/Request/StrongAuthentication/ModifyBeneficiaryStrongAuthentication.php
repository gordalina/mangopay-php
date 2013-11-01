<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\StrongAuthentication;

use Gordalina\Mangopay\Model\StrongAuthentication;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class ModifyBeneficiaryStrongAuthentication extends RequestModel implements RequestInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'PUT';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return sprintf('/beneficiaries/%s/strongAuthentication', $this->model->getBeneficiaryID());
    }

    /**
     * @param StrongAuthentication $strongAuthentication
     */
    public function __construct(StrongAuthentication $strongAuthentication)
    {
        $this->setModel($strongAuthentication);
    }
}

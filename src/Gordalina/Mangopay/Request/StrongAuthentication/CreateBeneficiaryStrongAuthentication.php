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

class CreateUserStrongAuthentication extends RequestModel implements RequestInterface
{
    protected $id;

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
        return sprintf('/beneficiaries/%s/strongAuthentication', $id);
    }

    /**
     * @param  integer              $id
     * @param  StrongAuthentication $StrongAuthentication
     */
    public function __construct($id, StrongAuthentication $StrongAuthentication)
    {
        $this->id = $id;
        $this->setModel($StrongAuthentication);
    }
}

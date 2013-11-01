<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\Wallet;

use Gordalina\Mangopay\Model\Wallet;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class ModifyWallet extends RequestModel implements RequestInterface
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
        return sprintf('/wallets/%s', $this->model->getID());
    }

    /**
     * @param Wallet $wallet
     */
    public function __construct(Wallet $wallet)
    {
        $this->setModel($wallet);
    }
}

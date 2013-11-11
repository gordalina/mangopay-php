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

class CreateWallet extends RequestModel implements RequestInterface
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
        return '/wallets';
    }

    /**
     * @param  Wallet                    $wallet
     * @throws \InvalidArgumentException If $wallet is not valid
     */
    public function __construct(Wallet $wallet)
    {
        if ($wallet->isValid() === false) {
            throw new \InvalidArgumentException("Wallet::isValid() returned false");
        }

        $this->setModel($wallet);
    }
}

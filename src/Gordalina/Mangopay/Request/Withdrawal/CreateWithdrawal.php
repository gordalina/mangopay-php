<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\Withdrawal;

use Gordalina\Mangopay\Model\Withdrawal;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateWithdrawal extends RequestModel implements RequestInterface
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
        return '/withdrawals';
    }

    /**
     * @param  Withdrawal $withdrawal
     * @throws \InvalidArgumentException If $withdrawal is not valid
     */
    public function __construct(Withdrawal $withdrawal)
    {
        if ($withdrawal->isValid() === false) {
            throw new \InvalidArgumentException("Withdrawal::isValid() returned false");
        }

        $this->setModel($withdrawal);
    }
}

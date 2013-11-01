<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\Refund;

use Gordalina\Mangopay\Model\Refund;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateRefund extends RequestModel implements RequestInterface
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
        return '/Refunds';
    }

    /**
     * @param  Refund $refund
     * @throws \InvalidArgumentException If $refund is not valid
     */
    public function __construct(Refund $refund)
    {
        if ($refund->isValid() === false) {
            throw new \InvalidArgumentException("Refund::isValid() returned false");
        }

        $this->setModel($refund);
    }
}

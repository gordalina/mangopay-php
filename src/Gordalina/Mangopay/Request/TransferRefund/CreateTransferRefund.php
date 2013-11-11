<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\TransferRefund;

use Gordalina\Mangopay\Model\TransferRefund;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateTransferRefund extends RequestModel implements RequestInterface
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
        return '/transfer-refunds';
    }

    /**
     * @param  Transfer                  $transfer
     * @throws \InvalidArgumentException If $transfer is not valid
     */
    public function __construct(TransferRefund $transfer)
    {
        if ($transfer->isValid() === false) {
            throw new \InvalidArgumentException("Transfer::isValid() returned false");
        }

        $this->setModel($transfer);
    }
}

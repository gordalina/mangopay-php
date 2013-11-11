<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\PaymentCard;

use Gordalina\Mangopay\Model\PaymentCard;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreatePaymentCard extends RequestModel implements RequestInterface
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
        return '/cards';
    }

    /**
     * @param  PaymentCard               $card
     * @throws \InvalidArgumentException If $card is not valid
     */
    public function __construct(PaymentCard $card)
    {
        if ($card->isValid() === false) {
            throw new \InvalidArgumentException("PaymentCard::isValid() returned false");
        }

        $this->setModel($card);
    }
}

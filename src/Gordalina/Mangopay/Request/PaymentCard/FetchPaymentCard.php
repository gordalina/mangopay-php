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

class FetchPaymentCard extends RequestModel implements RequestInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'GET';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return sprintf('/cards/%s', $this->id);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return null;
    }

    /**
     * @param integer $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->setModel(new PaymentCard());
    }
}

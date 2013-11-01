<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\User;

use Gordalina\Mangopay\Model\PaymentCard;
use Gordalina\Mangopay\Model\User;
use Gordalina\Mangopay\Request\RequestModelCollection;
use Gordalina\Mangopay\Request\RequestInterface;

class ListUserPaymentCards extends RequestModelCollection implements RequestInterface
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
        return sprintf('/users/%s/cards', $this->id);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return null;
    }

    /**
     * @param User|integer $id
     */
    public function __construct($id)
    {
        if ($id instanceof User) {
            $id = $id->getID();
        }

        $this->id = $id;
        $this->setModel(new PaymentCard());
    }
}

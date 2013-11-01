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

use Gordalina\Mangopay\Model\User;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class ModifyUser extends RequestModel implements RequestInterface
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
        return sprintf('/users/%s', $this->model->getID());
    }

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->setModel($user);
    }
}

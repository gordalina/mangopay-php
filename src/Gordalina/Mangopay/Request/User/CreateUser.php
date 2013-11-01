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

class CreateUser extends RequestModel implements RequestInterface
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
        return '/users';
    }

    /**
     * @param  User $user
     * @throws \InvalidArgumentException If $user is not valid
     */
    public function __construct(User $user)
    {
        if ($user->isValid() === false) {
            throw new \InvalidArgumentException("User::isValid() returned false");
        }

        $this->setModel($user);
    }
}

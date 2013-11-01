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

use Gordalina\Mangopay\Model\User;
use Gordalina\Mangopay\Model\Wallet;
use Gordalina\Mangopay\Request\RequestModelCollection;
use Gordalina\Mangopay\Request\RequestInterface;

class ListWalletUsers extends RequestModelCollection implements RequestInterface
{
    const INCLUDE_OWNERS = 'owners';
    const INCLUDE_CONTRIBUTORS = 'contributors';
    const INCLUDE_REFUNDED = 'refunded';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $include;

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
        $path = sprintf('/wallets/%s/users', $this->id);

        if ($this->include) {
            return sprintf('%s?include=%s', $path, $this->include);
        }

        return $path;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return null;
    }

    /**
     * @param Wallet|integer $id
     */
    public function __construct($id, $include = null)
    {
        if ($id instanceof Wallet) {
            $id = $id->getID();
        }

        $this->id = $id;
        $this->setModel(new User());

        if (!$include) {
            return;
        }

        $validUserTypes = array(
            static::INCLUDE_OWNERS,
            static::INCLUDE_CONTRIBUTORS,
            // static::INCLUDE_REFUNDED
            // apparently the API does not accept this parameter
        );

        if (!in_array($include, $validUserTypes)) {
            throw new \InvalidArgumentException(sprintf(
                '$include must be one of %s',
                implode(', ', $validUserTypes))
            );
        }

        $this->include = $include;
    }
}

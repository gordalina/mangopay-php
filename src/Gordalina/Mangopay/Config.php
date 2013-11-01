<?php

/*
 * This file is part of the mangopay-php package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay-php>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay;

class Config
{
    /**
     * @var string
     */
    protected $partner;

    /**
     * @var string
     */
    protected $privateKey;

    /**
     * @var string
     */
    protected $privateKeyPassphrase;

    /**
     * @param string $partner
     * @param string $privateKey
     * @param string $privateKeyPassphrase defaults to empty string
     */
    public function __construct($partner, $privateKey, $privateKeyPassphrase = '')
    {
        $this->partner = $partner;
        $this->privateKey = $privateKey;
        $this->privateKeyPassphrase = $privateKeyPassphrase;
    }

    /**
     * @return string
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @return string
     */
    public function getPrivateKeyPassphrase()
    {
        return $this->privateKeyPassphrase;
    }
}

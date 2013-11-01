<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Authentication;

class Signer
{
    /**
     * @var resource
     */
    private $privateKey;

    /**
     * @param string $privateKeyFile
     * @param string $privateKeyPassphrase defaults to an empty string
     */
    public function __construct($privateKeyFile, $privateKeyPassphrase = '')
    {
        $this->privateKey = openssl_pkey_get_private($privateKeyFile, $privateKeyPassphrase);
    }

    /**
     * @param  string $method
     * @param  string $path
     * @param  string $body
     * @return string
     */
    public function getSignature($method, $path, $body = '')
    {
        $signed = null;
        $digest = sprintf('%s|%s|', $method, $path);

        if ($method != 'GET' && $method != 'DELETE') {
            $digest .= sprintf('%s|', $body);
        }

        openssl_sign($digest, $signed, $this->privateKey, OPENSSL_ALGO_SHA1);

        return base64_encode($signed);
    }
}

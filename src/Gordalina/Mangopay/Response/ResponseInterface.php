<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Response;

interface ResponseInterface
{
    /**
     * @return integer
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return boolean
     */
    public function isSuccessful();
}

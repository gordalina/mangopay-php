<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request;

use Gordalina\Mangopay\Response\ResponseInterface;

interface RequestInterface
{
    /**
     * HTTP Method
     *
     * @return string
     */
    public function getMethod();

    /**
     * HTTP path without the host part and partner prefix
     *
     * @return string
     */
    public function getPath();

    /**
     * Body to be sent in the HTTP request
     *
     * @return string
     */
    public function getBody();


    /**
     * @param  ResponseInterface $response
     * @return null
     */
    public function handle(ResponseInterface $response);
}

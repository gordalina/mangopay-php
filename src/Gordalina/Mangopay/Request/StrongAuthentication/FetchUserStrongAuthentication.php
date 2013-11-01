<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\StrongAuthentication;

use Gordalina\Mangopay\Model\StrongAuthentication;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class FetchUserStrongAuthentication extends RequestModel implements RequestInterface
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
        return sprintf('/users/%s/strongAuthentications', $this->id);
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
        $this->setModel(new StrongAuthentication());
    }
}

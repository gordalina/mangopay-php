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

class ResponseModel extends Response
{
    /**
     * @var object
     */
    protected $model;

    /**
     * @param object $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return object
     */
    public function getModel()
    {
        return $this->model;
    }
}

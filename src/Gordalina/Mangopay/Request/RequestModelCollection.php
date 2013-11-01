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

use Gordalina\Mangopay\Model\AbstractModel;
use Gordalina\Mangopay\Response\ResponseInterface;

abstract class RequestModelCollection extends RequestModel
{
    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ResponseInterface $response)
    {
        $collection = array();
        $class = get_class($this->model);
        $objects = json_decode($response->getBody());

        foreach ($objects as $object) {
            $model = new $class();
            $model->update($object);
            $collection[] = $model;
        }

        $response->setCollection($collection);
    }
}

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

abstract class RequestModel
{
    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return json_encode($this->model->jsonSerialize());
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ResponseInterface $response)
    {
        $class = get_class($this->model);

        $model = new $class();
        $model->jsonUnserialize($response->getBody());

        $response->setModel($model);
    }

    /**
     * @return AbstractModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param AbstractModel $model
     */
    protected function setModel(AbstractModel $model)
    {
        $this->model = $model;
    }
}

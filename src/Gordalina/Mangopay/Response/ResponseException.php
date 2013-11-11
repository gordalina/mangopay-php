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

use Exception;

class ResponseException extends Exception implements ResponseInferface
{
    /**
     * @var integer
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var integer
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $technicalMessage;

    /**
     * @var string
     */
    protected $userMessage;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param integer $statusCode
     * @param string  $body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;

        $object = json_decode($body);

        $this->errorCode = $object->ErrorCode;
        $this->technicalMessage = $object->TechnicalMessage;
        $this->userMessage = $object->UserMessage;
        $this->type = $object->Type;
    }

    /**
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * @param  integer  $statusCode
     * @return Response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param  integer  $body
     * @return Response
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return object
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getTechnicalMessage()
    {
        return $this->technicalMessage;
    }

    /**
     * @return string
     */
    public function getUserMessage()
    {
        return $this->userMessage;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

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

class ResponseException extends Response
{
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
        $this->setStatusCode($statusCode);
        $this->setBody($body);

        $object = json_decode($body);

        $this->errorCode = $object->ErrorCode;
        $this->technicalMessage = $object->TechnicalMessage;
        $this->userMessage = $object->UserMessage;
        $this->type = $object->Type;
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

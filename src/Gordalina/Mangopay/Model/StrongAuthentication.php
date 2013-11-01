<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Model;

class StrongAuthentication extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $UserID;

    /**
     * @var integer
     */
    protected $BeneficiaryID;

    /**
     * @var string
     */
    protected $UrlRequest;

    /**
     * @var boolean
     */
    protected $IsDocumentsTransmitted;

    /**
     * @var boolean
     */
    protected $IsCompleted;

    /**
     * @var boolean
     */
    protected $IsSucceeded;

    /**
     * @var string
     */
    protected $Message;

    /**
     * @return integer
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @return integer
     */
    public function getBeneficiaryID()
    {
        return $this->BeneficiaryID;
    }

    /**
     * @return string
     */
    public function getUrlRequest()
    {
        return $this->UrlRequest;
    }

    /**
     * @return boolean
     */
    public function getIsDocumentsTransmitted()
    {
        return $this->IsDocumentsTransmitted;
    }

    /**
     * @return boolean
     */
    public function getIsCompleted()
    {
        return $this->IsCompleted;
    }

    /**
     * @return boolean
     */
    public function getIsSucceeded()
    {
        return $this->IsSucceeded;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * @param  integer $UserID
     * @return StrongAuthentication
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @param  integer $BeneficiaryID
     * @return StrongAuthentication
     */
    public function setBeneficiaryID($BeneficiaryID)
    {
        $this->BeneficiaryID = $BeneficiaryID;
        return $this;
    }

    /**
     * @param  string $UrlRequest
     * @return StrongAuthentication
     */
    public function setUrlRequest($UrlRequest)
    {
        $this->UrlRequest = $UrlRequest;
        return $this;
    }

    /**
     * @param  boolean $IsDocumentsTransmitted
     * @return StrongAuthentication
     */
    public function setIsDocumentsTransmitted($IsDocumentsTransmitted)
    {
        $this->IsDocumentsTransmitted = $IsDocumentsTransmitted;
        return $this;
    }

    /**
     * @param  boolean $IsCompleted
     * @return StrongAuthentication
     */
    public function setIsCompleted($IsCompleted)
    {
        $this->IsCompleted = $IsCompleted;
        return $this;
    }

    /**
     * @param  boolean $IsSucceeded
     * @return StrongAuthentication
     */
    public function setIsSucceeded($IsSucceeded)
    {
        $this->IsSucceeded = $IsSucceeded;
        return $this;
    }

    /**
     * @param  string $Message
     * @return StrongAuthentication
     */
    public function setMessage($Message)
    {
        $this->Message = $Message;
        return $this;
    }
}

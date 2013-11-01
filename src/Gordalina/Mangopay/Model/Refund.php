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

class Refund extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $UserID;

    /**
     * @var integer
     */
    protected $ContributionID;

    /**
     * @var boolean
     */
    protected $IsSucceeded;

    /**
     * @var boolean
     */
    protected $IsCompleted;

    /**
     * @var mixed
     */
    protected $Error;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->UserID
            && $this->ContributionID;
    }

    /**
     * @return boolean
     */
    public function isValidRefundRefund()
    {
        return $this->RefundID
            && $this->UserID;
    }

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
    public function getContributionID()
    {
        return $this->ContributionID;
    }

    /**
     * @return boolean
     */
    public function getIsSucceeded()
    {
        return $this->IsSucceeded;
    }

    /**
     * @return boolean
     */
    public function getIsCompleted()
    {
        return $this->IsCompleted;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->Error;
    }

    /**
     * @param  integer $UserID
     * @return Refund
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @param  integer $ContributionID
     * @return Refund
     */
    public function setContributionID($ContributionID)
    {
        $this->ContributionID = $ContributionID;
        return $this;
    }

    /**
     * @param  boolean $IsSucceeded
     * @return Refund
     */
    public function setIsSucceeded($IsSucceeded)
    {
        $this->IsSucceeded = $IsSucceeded;
        return $this;
    }

    /**
     * @param  boolean $IsCompleted
     * @return Refund
     */
    public function setIsCompleted($IsCompleted)
    {
        $this->IsCompleted = $IsCompleted;
        return $this;
    }

    /**
     * @param  mixed  $Error
     * @return Refund
     */
    public function setError($Error)
    {
        $this->Error = $Error;
        return $this;
    }
}

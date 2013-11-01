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

class Operations extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $UserID;

    /**
     * @var integer
     */
    protected $WalletID;

    /**
     * @var integer
     */
    protected $Amount;

    /**
     * @var integer
     */
    protected $TransactionType;

    /**
     * @var integer
     */
    protected $TransactionID;

    /**
     * @var integer
     */
    protected $LeetchiFeeAmount;

    /**
     * @var boolean
     */
    protected $IsCompleted;

    /**
     * @var boolean
     */
    protected $IsSucceeded;

    /**
     * @var integer
     */
    protected $BeneficiaryID;

    /**
     * @var mixed
     */
    protected $Error;

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
    public function getWalletID()
    {
        return $this->WalletID;
    }

    /**
     * @return integer
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->TransactionType;
    }

    /**
     * @return integer
     */
    public function getTransactionID()
    {
        return $this->TransactionID;
    }

    /**
     * @param  integer    $UserID
     * @return Operations
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @param  integer    $WalletID
     * @return Operations
     */
    public function setWalletID($WalletID)
    {
        $this->WalletID = $WalletID;
        return $this;
    }

    /**
     * @param  integer    $Amount
     * @return Operations
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * @param  string    $TransactionType
     * @return Operations
     */
    public function setTransactionType($TransactionType)
    {
        $this->TransactionType = $TransactionType;
        return $this;
    }

    /**
     * @param  integer    $TransactionID
     * @return Operations
     */
    public function setTransactionID($TransactionID)
    {
        $this->TransactionID = $TransactionID;
        return $this;
    }
}

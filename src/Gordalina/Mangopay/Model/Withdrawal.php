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

class Withdrawal extends TimestampableModel
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
    protected $AmountWithoutFees;

    /**
     * @var integer
     */
    protected $ClientFeeAmount;

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
     * @var string
     */
    protected $BankAccountOwnerName;

    /**
     * @var string
     */
    protected $BankAccountOwnerAddress;

    /**
     * @var string
     */
    protected $BankAccountIBAN;

    /**
     * @var string
     */
    protected $BankAccountBIC;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->UserID
            && $this->WalletID
            && $this->BeneficiaryID
            && $this->Amount >= 70;
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
     * @return integer
     */
    public function getAmountWithoutFees()
    {
        return $this->AmountWithoutFees;
    }

    /**
     * @return integer
     */
    public function getClientFeeAmount()
    {
        return $this->ClientFeeAmount;
    }

    /**
     * @return integer
     */
    public function getLeetchiFeeAmount()
    {
        return $this->LeetchiFeeAmount;
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
     * @return integer
     */
    public function getBeneficiaryID()
    {
        return $this->BeneficiaryID;
    }

    /**
     * @return integer
     */
    public function getError()
    {
        return $this->Error;
    }

    /**
     * @param  integer    $UserID
     * @return Withdrawal
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @param  integer    $WalletID
     * @return Withdrawal
     */
    public function setWalletID($WalletID)
    {
        $this->WalletID = $WalletID;

        return $this;
    }

    /**
     * @param  integer    $Amount
     * @return Withdrawal
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * @param  integer    $AmountWithoutFees
     * @return Withdrawal
     */
    public function setAmountWithoutFees($AmountWithoutFees)
    {
        $this->AmountWithoutFees = $AmountWithoutFees;

        return $this;
    }

    /**
     * @param  integer    $ClientFeeAmount
     * @return Withdrawal
     */
    public function setClientFeeAmount($ClientFeeAmount)
    {
        $this->ClientFeeAmount = $ClientFeeAmount;

        return $this;
    }

    /**
     * @param  integer    $LeetchiFeeAmount
     * @return Withdrawal
     */
    public function setLeetchiFeeAmount($LeetchiFeeAmount)
    {
        $this->LeetchiFeeAmount = $LeetchiFeeAmount;

        return $this;
    }

    /**
     * @param  boolean    $IsCompleted
     * @return Withdrawal
     */
    public function setIsCompleted($IsCompleted)
    {
        $this->IsCompleted = $IsCompleted;

        return $this;
    }

    /**
     * @param  boolean    $IsSucceeded
     * @return Withdrawal
     */
    public function setIsSucceeded($IsSucceeded)
    {
        $this->IsSucceeded = $IsSucceeded;

        return $this;
    }

    /**
     * @param  integer    $BeneficiaryID
     * @return Withdrawal
     */
    public function setBeneficiaryID($BeneficiaryID)
    {
        $this->BeneficiaryID = $BeneficiaryID;

        return $this;
    }

    /**
     * @param  integer    $Error
     * @return Withdrawal
     */
    public function setError($Error)
    {
        $this->Error = $Error;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccountOwnerName()
    {
        return $this->BankAccountOwnerName;
    }

    /**
     * @return string
     */
    public function getBankAccountOwnerAddress()
    {
        return $this->BankAccountOwnerAddress;
    }

    /**
     * @return string
     */
    public function getBankAccountIBAN()
    {
        return $this->BankAccountIBAN;
    }

    /**
     * @return string
     */
    public function getBankAccountBIC()
    {
        return $this->BankAccountBIC;
    }

    /**
     * @param  string $BankAccountOwnerName
     * @return Withdrawal
     */
    public function setBankAccountOwnerName($BankAccountOwnerName)
    {
        $this->BankAccountOwnerName = $BankAccountOwnerName;

        return $this;
    }

    /**
     * @param  string $BankAccountOwnerAddress
     * @return Withdrawal
     */
    public function setBankAccountOwnerAddress($BankAccountOwnerAddress)
    {
        $this->BankAccountOwnerAddress = $BankAccountOwnerAddress;

        return $this;
    }

    /**
     * @param  string $BankAccountIBAN
     * @return Withdrawal
     */
    public function setBankAccountIBAN($BankAccountIBAN)
    {
        $this->BankAccountIBAN = $BankAccountIBAN;

        return $this;
    }

    /**
     * @param  string $BankAccountBIC
     * @return Withdrawal
     */
    public function setBankAccountBIC($BankAccountBIC)
    {
        $this->BankAccountBIC = $BankAccountBIC;

        return $this;
    }
}

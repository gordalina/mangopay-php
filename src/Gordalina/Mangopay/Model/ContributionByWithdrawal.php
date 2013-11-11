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

class ContributionByWithdrawal extends TimestampableModel
{
    const STATUS_CREATED = 'CREATED';
    const STATUS_ACCEPTED = 'ACCEPTED';
    const STATUS_REFUSED = 'REFUSED';

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
    protected $AmountDeclared;

    /**
     * @var integer
     */
    protected $Status;

    /**
     * @var integer
     */
    protected $Amount;

    /**
     * @var string
     */
    protected $GeneratedReference;

    /**
     * @var string
     */
    protected $Commentary;

    /**
     * @var string
     */
    protected $BankAccountOwner;

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
            && $this->AmountDeclared;
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
    public function getAmountDeclared()
    {
        return $this->AmountDeclared;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
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
    public function getGeneratedReference()
    {
        return $this->GeneratedReference;
    }

    /**
     * @return string
     */
    public function getCommentary()
    {
        return $this->Commentary;
    }

    /**
     * @return string
     */
    public function getBankAccountOwner()
    {
        return $this->BankAccountOwner;
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
     * @param  integer                  $UserID
     * @return ContributionByWithdrawal
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @param  integer                  $WalletID
     * @return ContributionByWithdrawal
     */
    public function setWalletID($WalletID)
    {
        $this->WalletID = $WalletID;

        return $this;
    }

    /**
     * @param  integer                  $AmountDeclared
     * @return ContributionByWithdrawal
     */
    public function setAmountDeclared($AmountDeclared)
    {
        $this->AmountDeclared = $AmountDeclared;

        return $this;
    }

    /**
     * @param  integer                  $Status
     * @return ContributionByWithdrawal
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @param  integer                  $Amount
     * @return ContributionByWithdrawal
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * @param  string                   $GeneratedReference
     * @return ContributionByWithdrawal
     */
    public function setGeneratedReference($GeneratedReference)
    {
        $this->GeneratedReference = $GeneratedReference;

        return $this;
    }

    /**
     * @param  string                   $Commentary
     * @return ContributionByWithdrawal
     */
    public function setCommentary($Commentary)
    {
        $this->Commentary = $Commentary;

        return $this;
    }

    /**
     * @param  string                   $BankAccountOwner
     * @return ContributionByWithdrawal
     */
    public function setBankAccountOwner($BankAccountOwner)
    {
        $this->BankAccountOwner = $BankAccountOwner;

        return $this;
    }

    /**
     * @param  string                   $BankAccountIBAN
     * @return ContributionByWithdrawal
     */
    public function setBankAccountIBAN($BankAccountIBAN)
    {
        $this->BankAccountIBAN = $BankAccountIBAN;

        return $this;
    }

    /**
     * @param  string                   $BankAccountBIC
     * @return ContributionByWithdrawal
     */
    public function setBankAccountBIC($BankAccountBIC)
    {
        $this->BankAccountBIC = $BankAccountBIC;

        return $this;
    }
}

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

class Beneficiary extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $UserID;

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
        return $this->BankAccountOwnerName
            && $this->BankAccountOwnerAddress
            && $this->BankAccountIBAN
            && $this->BankAccountBIC;
    }

    /**
     * @return integer
     */
    public function getUserID()
    {
        return $this->UserID;
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
     * @param  integer     $UserID
     * @return Beneficiary
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @param  string      $BankAccountOwnerName
     * @return Beneficiary
     */
    public function setBankAccountOwnerName($BankAccountOwnerName)
    {
        $this->BankAccountOwnerName = $BankAccountOwnerName;

        return $this;
    }

    /**
     * @param  string      $BankAccountOwnerAddress
     * @return Beneficiary
     */
    public function setBankAccountOwnerAddress($BankAccountOwnerAddress)
    {
        $this->BankAccountOwnerAddress = $BankAccountOwnerAddress;

        return $this;
    }

    /**
     * @param  string      $BankAccountIBAN
     * @return Beneficiary
     */
    public function setBankAccountIBAN($BankAccountIBAN)
    {
        $this->BankAccountIBAN = $BankAccountIBAN;

        return $this;
    }

    /**
     * @param  string      $BankAccountBIC
     * @return Beneficiary
     */
    public function setBankAccountBIC($BankAccountBIC)
    {
        $this->BankAccountBIC = $BankAccountBIC;

        return $this;
    }
}

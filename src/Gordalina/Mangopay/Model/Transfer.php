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

class Transfer extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $PayerID;

    /**
     * @var integer
     */
    protected $BeneficiaryID;

    /**
     * @var integer
     */
    protected $Amount;

    /**
     * @var integer
     */
    protected $ClientFeeAmount;

    /**
     * @var integer
     */
    protected $PayerWalletID;

    /**
     * @var integer
     */
    protected $BeneficiaryWalletID;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->Amount;
    }

    /**
     * @return boolean
     */
    public function isValidTransferRefund()
    {
        return $this->TransferID
            && $this->UserID;
    }

    /**
     * @return integer
     */
    public function getPayerID()
    {
        return $this->PayerID;
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
    public function getAmount()
    {
        return $this->Amount;
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
    public function getPayerWalletID()
    {
        return $this->PayerWalletID;
    }

    /**
     * @return integer
     */
    public function getBeneficiaryWalletID()
    {
        return $this->BeneficiaryWalletID;
    }

    /**
     * @param  integer  $PayerID
     * @return Transfer
     */
    public function setPayerID($PayerID)
    {
        $this->PayerID = $PayerID;

        return $this;
    }

    /**
     * @param  integer  $BeneficiaryID
     * @return Transfer
     */
    public function setBeneficiaryID($BeneficiaryID)
    {
        $this->BeneficiaryID = $BeneficiaryID;

        return $this;
    }

    /**
     * @param  integer  $Amount
     * @return Transfer
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * @param  integer  $ClientFeeAmount
     * @return Transfer
     */
    public function setClientFeeAmount($ClientFeeAmount)
    {
        $this->ClientFeeAmount = $ClientFeeAmount;

        return $this;
    }

    /**
     * @param  integer  $PayerWalletID
     * @return Transfer
     */
    public function setPayerWalletID($PayerWalletID)
    {
        $this->PayerWalletID = $PayerWalletID;

        return $this;
    }

    /**
     * @param  integer  $BeneficiaryWalletID
     * @return Transfer
     */
    public function setBeneficiaryWalletID($BeneficiaryWalletID)
    {
        $this->BeneficiaryWalletID = $BeneficiaryWalletID;

        return $this;
    }
}

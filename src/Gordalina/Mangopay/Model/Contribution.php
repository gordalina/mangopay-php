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

class Contribution extends TimestampableModel
{
    const TYPE_PAYLINE = 'Payline';
    const TYPE_OGONE = 'Ogone';

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
    protected $ClientFeeAmount;

    /**
     * @var integer
     */
    protected $LeetchiFeeAmount;

    /**
     * @var boolean
     */
    protected $IsSucceeded;

    /**
     * @var boolean
     */
    protected $IsCompleted;

    /**
     * @var string
     */
    protected $PaymentURL;

    /**
     * @var string
     */
    protected $TemplateURL;

    /**
     * @var string
     */
    protected $ReturnURL;

    /**
     * @var boolean
     */
    protected $RegisterMeanOfPayment;

    /**
     * @var mixed
     */
    protected $Error;

    /**
     * @var integer
     */
    protected $PaymentCardID;

    /**
     * @var string
     */
    protected $Culture;

    /**
     * @var string
     */
    protected $Type;

    /**
     * @var string
     */
    protected $PaymentMethodType;

    /**
     * @var string
     */
    protected $AnswerCode;

    /**
     * @var string
     */
    protected $AnswerMessage;

    /**
     * @return boolean
     */
    public function isValidContribution()
    {
        // A contribution must be between 101 and 2500 euros
        // to have more than 2500 euros you need to have strong auth
        return $this->UserID
            && $this->WalletID >= 0
            && $this->Amount >= 100
            && $this->ReturnURL;
    }

    /**
     * @return boolean
     */
    public function isValidImmediateContribution()
    {
        return $this->UserID
            && $this->WalletID >= 0
            && $this->Amount >= 100
            && $this->PaymentCardID;
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
     * @return string
     */
    public function getPaymentURL()
    {
        return $this->PaymentURL;
    }

    /**
     * @return string
     */
    public function getTemplateURL()
    {
        return $this->TemplateURL;
    }

    /**
     * @return string
     */
    public function getReturnURL()
    {
        return $this->ReturnURL;
    }

    /**
     * @return boolean
     */
    public function getRegisterMeanOfPayment()
    {
        return $this->RegisterMeanOfPayment;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->Error;
    }

    /**
     * @return integer
     */
    public function getPaymentCardID()
    {
        return $this->PaymentCardID;
    }

    /**
     * @return string
     */
    public function getCulture()
    {
        return $this->Culture;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @return string
     */
    public function getPaymentMethodType()
    {
        return $this->PaymentMethodType;
    }

    /**
     * @return string
     */
    public function getAnswerCode()
    {
        return $this->AnswerCode;
    }

    /**
     * @return string
     */
    public function getAnswerMessage()
    {
        return $this->AnswerMessage;
    }

    /**
     * @param  integer      $UserID
     * @return Contribution
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @param  integer      $WalletID
     * @return Contribution
     */
    public function setWalletID($WalletID)
    {
        $this->WalletID = $WalletID;

        return $this;
    }

    /**
     * @param  integer      $Amount
     * @return Contribution
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * @param  integer      $ClientFeeAmount
     * @return Contribution
     */
    public function setClientFeeAmount($ClientFeeAmount)
    {
        $this->ClientFeeAmount = $ClientFeeAmount;

        return $this;
    }

    /**
     * @param  integer      $LeetchiFeeAmount
     * @return Contribution
     */
    public function setLeetchiFeeAmount($LeetchiFeeAmount)
    {
        $this->LeetchiFeeAmount = $LeetchiFeeAmount;

        return $this;
    }

    /**
     * @param  boolean      $IsSucceeded
     * @return Contribution
     */
    public function setIsSucceeded($IsSucceeded)
    {
        $this->IsSucceeded = $IsSucceeded;

        return $this;
    }

    /**
     * @param  boolean      $IsCompleted
     * @return Contribution
     */
    public function setIsCompleted($IsCompleted)
    {
        $this->IsCompleted = $IsCompleted;

        return $this;
    }

    /**
     * @param  string       $PaymentURL
     * @return Contribution
     */
    public function setPaymentURL($PaymentURL)
    {
        $this->PaymentURL = $PaymentURL;

        return $this;
    }

    /**
     * @param  string       $TemplateURL
     * @return Contribution
     */
    public function setTemplateURL($TemplateURL)
    {
        $this->TemplateURL = $TemplateURL;

        return $this;
    }

    /**
     * @param  string       $ReturnURL
     * @return Contribution
     */
    public function setReturnURL($ReturnURL)
    {
        $this->ReturnURL = $ReturnURL;

        return $this;
    }

    /**
     * @param  boolean      $RegisterMeanOfPayment
     * @return Contribution
     */
    public function setRegisterMeanOfPayment($RegisterMeanOfPayment)
    {
        $this->RegisterMeanOfPayment = $RegisterMeanOfPayment;

        return $this;
    }

    /**
     * @param  mixed        $Error
     * @return Contribution
     */
    public function setError($Error)
    {
        $this->Error = $Error;

        return $this;
    }

    /**
     * @param  integer      $PaymentCardID
     * @return Contribution
     */
    public function setPaymentCardID($PaymentCardID)
    {
        $this->PaymentCardID = $PaymentCardID;

        return $this;
    }

    /**
     * @param  string       $Culture
     * @return Contribution
     */
    public function setCulture($Culture)
    {
        $this->Culture = $Culture;

        return $this;
    }

    /**
     * @param  string       $Type
     * @return Contribution
     */
    public function setType($Type)
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @param  string       $PaymentMethodType
     * @return Contribution
     */
    public function setPaymentMethodType($PaymentMethodType)
    {
        $this->PaymentMethodType = $PaymentMethodType;

        return $this;
    }

    /**
     * @param  string       $AnswerCode
     * @return Contribution
     */
    public function setAnswerCode($AnswerCode)
    {
        $this->AnswerCode = $AnswerCode;

        return $this;
    }

    /**
     * @param  string       $AnswerMessage
     * @return Contribution
     */
    public function setAnswerMessage($AnswerMessage)
    {
        $this->AnswerMessage = $AnswerMessage;

        return $this;
    }
}

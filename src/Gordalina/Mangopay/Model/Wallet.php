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

use DateTime;

class Wallet extends TimestampableModel
{
    /**
     * @var array
     */
    protected $Owners;

    /**
     * @var string
     */
    protected $Name;

    /**
     * @var string
     */
    protected $Description;

    /**
     * @var integer
     */
    protected $RaisingGoalAmount;

    /**
     * @var integer
     */
    protected $CollectedAmount;

    /**
     * @var integer
     */
    protected $SpentAmount;

    /**
     * @var integer
     */
    protected $Amount;

    /**
     * @var DateTime
     */
    protected $ContributionLimitDate;

    /**
     * @var boolean
     */
    protected $IsClosed;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return count($this->Owners)
            && strlen($this->Name) < 200
            && strlen($this->Description) < 4000
            && $this->RaisingGoalAmount >= 0;
    }

    /**
     * @return array
     */
    public function getOwners()
    {
        return $this->Owners;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return integer
     */
    public function getRaisingGoalAmount()
    {
        return $this->RaisingGoalAmount;
    }

    /**
     * @return integer
     */
    public function getCollectedAmount()
    {
        return $this->CollectedAmount;
    }

    /**
     * @return integer
     */
    public function getSpentAmount()
    {
        return $this->SpentAmount;
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
    public function getContributionLimitDate()
    {
        if ($this->ContributionLimitDate instanceof DateTime) {
            return $this->ContributionLimitDate->format('U');
        }

        return $this->ContributionLimitDate;
    }

    /**
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->IsClosed;
    }

    /**
     * @param  array $Owners
     * @return Wallet
     */
    public function setOwners(array $Owners)
    {
        $this->Owners = $Owners;
        return $this;
    }

    /**
     * @param  string $Name
     * @return Wallet
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @param  string $Description
     * @return Wallet
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @param  integer $RaisingGoalAmount
     * @return Wallet
     */
    public function setRaisingGoalAmount($RaisingGoalAmount)
    {
        $this->RaisingGoalAmount = $RaisingGoalAmount;
        return $this;
    }

    /**
     * @param  integer|DateTime $ContributionLimitDate
     * @return Wallet
     */
    public function setContributionLimitDate($ContributionLimitDate)
    {
        if ($ContributionLimitDate instanceof DateTime) {
            $this->ContributionLimitDate = $ContributionLimitDate;
        } else {
            $this->ContributionLimitDate = new DateTime(sprintf('@%d', $ContributionLimitDate));
        }

        return $this;
    }

    /**
     * Below are Immutable fields, even if you set them they will not be
     * persisted in the API.
     */

    /**
     * Immutable field
     *
     * @param  integer $CollectedAmount
     * @return Wallet
     */
    public function setCollectedAmount($CollectedAmount)
    {
        $this->CollectedAmount = $CollectedAmount;
        return $this;
    }

    /**
     * Immutable field
     *
     * @param  integer $SpentAmount
     * @return Wallet
     */
    public function setSpentAmount($SpentAmount)
    {
        $this->SpentAmount = $SpentAmount;
        return $this;
    }

    /**
     * Immutable field
     *
     * @param  integer $Amount
     * @return Wallet
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * Immutable field
     *
     * @param  boolean $IsClosed
     * @return Wallet
     */
    public function setIsClosed($IsClosed)
    {
        $this->IsClosed = (boolean) $IsClosed;
        return $this;
    }
}

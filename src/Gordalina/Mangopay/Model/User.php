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
use Gordalina\Mangopay\Utils;

class User extends TimestampableModel
{
    const NATURAL_PERSON = 'NATURAL_PERSON';
    const LEGAL_PERSONALITY = 'LEGAL_PERSONALITY';

    /**
     * @var string
     */
    protected $Email;

    /**
     * @var string
     */
    protected $FirstName;

    /**
     * @var string
     */
    protected $LastName;

    /**
     * @var boolean
     */
    protected $HasRegisteredMeansOfPayment;

    /**
     * @var boolean
     */
    protected $CanRegisterMeanOfPayment;

    /**
     * @var string
     */
    protected $IP;

    /**
     * @var integer
     */
    protected $Birthday;

    /**
     * @var string
     */
    protected $Password;

    /**
     * @var string
     */
    protected $Nationality;

    /**
     * @var string
     */
    protected $PersonType;

    /**
     * @var integer
     */
    protected $PersonalWalletAmount;

    /**
     * @var boolean
     */
    protected $IsStrongAuthenticated;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->Email
            && $this->FirstName
            && $this->LastName
            && $this->IP
            && $this->Birthday
            && $this->Nationality
            && $this->PersonType;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @return boolean
     */
    public function getHasRegisteredMeansOfPayment()
    {
        return $this->HasRegisteredMeansOfPayment;
    }

    /**
     * @return boolean
     */
    public function getCanRegisterMeanOfPayment()
    {
        return $this->CanRegisterMeanOfPayment;
    }

    /**
     * @return string
     */
    public function getIP()
    {
        return $this->IP;
    }

    /**
     * @return integer
     */
    public function getBirthday()
    {
        if ($this->Birthday instanceof DateTime) {
            return $this->Birthday->format('U');
        }

        return $this->Birthday;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->Nationality;
    }

    /**
     * @return string
     */
    public function getPersonType()
    {
        return $this->PersonType;
    }

    /**
     * @return integer
     */
    public function getPersonalWalletAmount()
    {
        return $this->PersonalWalletAmount;
    }

    /**
     * @return boolean
     */
    public function getIsStrongAuthenticated()
    {
        return $this->IsStrongAuthenticated;
    }

    /**
     * @param  string $Email
     * @return User
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @param  string $FirstName
     * @return User
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @param  string $LastName
     * @return User
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * @param  boolean $CanRegisterMeanOfPayment
     * @return User
     */
    public function setCanRegisterMeanOfPayment($CanRegisterMeanOfPayment)
    {
        $this->CanRegisterMeanOfPayment = (boolean) $CanRegisterMeanOfPayment;
        return $this;
    }

    /**
     * @param  string $IP
     * @return User
     */
    public function setIP($IP)
    {
        if (!Utils::isIPv4($IP)) {
            throw new \InvalidArgumentException(sprintf('IP is not a valid Ipv4: %s', $IP));
        }

        $this->IP = $IP;
        return $this;
    }

    /**
     * @param  DateTime|integer $Birthday
     * @return User
     */
    public function setBirthday($Birthday)
    {
        if ($Birthday instanceof DateTime) {
            $this->Birthday = $Birthday;
        } else {
            $this->Birthday = new DateTime(sprintf('@%d', $Birthday));
        }

        return $this;
    }

    /**
     * @param  string $Password
     * @return User
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }

    /**
     * @param  string $Nationality
     * @return User
     */
    public function setNationality($Nationality)
    {
        if ($Nationality !== null && !Utils::isISO3166($Nationality)) {
            throw new \InvalidArgumentException(sprintf('Invalid nationality iso code: %s', $Nationality));
        }

        $this->Nationality = $Nationality;
        return $this;
    }

    /**
     * Below are Immutable fields, even if you set them they will not be
     * persisted in the API.
     */

    /**
     * Immutable field
     *
     * @param  boolean $HasRegisteredMeansOfPayment
     * @return User
     */
    public function setHasRegisteredMeansOfPayment($HasRegisteredMeansOfPayment)
    {
        $this->HasRegisteredMeansOfPayment = (boolean) $HasRegisteredMeansOfPayment;
        return $this;
    }

    /**
     * Immutable field
     *
     * @param  string $PersonType
     * @return User
     */
    public function setPersonType($PersonType)
    {
        switch ($PersonType) {
            case static::NATURAL_PERSON:
            case static::LEGAL_PERSONALITY:
                $this->PersonType = $PersonType;
            break;

            default:
                throw new \InvalidArgumentException(sprintf('Invalid person type: %s', $PersonType));
        }

        return $this;
    }

    /**
     * Immutable field
     *
     * @param  integer $PersonalWalletAmount
     * @return User
     */
    public function setPersonalWalletAmount($PersonalWalletAmount)
    {
        if ($PersonalWalletAmount < 0) {
            throw new \InvalidArgumentException(sprintf('Wallet amount cannot be negative: %d', $PersonalWalletAmount));
        }

        $this->PersonalWalletAmount = (integer) $PersonalWalletAmount;
        return $this;
    }

    /**
     * Immutable field
     *
     * @param  boolean $IsStrongAuthenticated
     * @return User
     */
    public function setIsStrongAuthenticated($IsStrongAuthenticated)
    {
        $this->IsStrongAuthenticated = (boolean) $IsStrongAuthenticated;
        return $this;
    }
}

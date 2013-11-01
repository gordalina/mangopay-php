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

use Gordalina\Mangopay\Utils;

class PaymentCard extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $OwnerID;

    /**
     * @var string
     */
    protected $CardNumber;

    /**
     * @var string
     */
    protected $RedirectURL;

    /**
     * @var string
     */
    protected $TemplateURL;

    /**
     * @var string
     */
    protected $ReturnURL;

    /**
     * @var string
     */
    protected $Culture;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->OwnerID
            && $this->ReturnURL;
    }

    /**
     * @return integer
     */
    public function getOwnerID()
    {
        return $this->OwnerID;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    /**
     * @return string
     */
    public function getRedirectURL()
    {
        return $this->RedirectURL;
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
     * @return string
     */
    public function getCulture()
    {
        return $this->Culture;
    }

    /**
     * @param  integer $OwnerID
     * @return PaymentCard
     */
    public function setOwnerID($OwnerID)
    {
        $this->OwnerID = $OwnerID;
        return $this;
    }

    /**
     * @param  string $CardNumber
     * @return PaymentCard
     */
    public function setCardNumber($CardNumber)
    {
        $this->CardNumber = $CardNumber;
        return $this;
    }

    /**
     * @param  string $RedirectURL
     * @return PaymentCard
     */
    public function setRedirectURL($RedirectURL)
    {
        $this->RedirectURL = $RedirectURL;
        return $this;
    }

    /**
     * @param  string $TemplateURL
     * @return PaymentCard
     */
    public function setTemplateURL($TemplateURL)
    {
        $this->TemplateURL = $TemplateURL;
        return $this;
    }

    /**
     * @param  string $ReturnURL
     * @return PaymentCard
     */
    public function setReturnURL($ReturnURL)
    {
        $this->ReturnURL = $ReturnURL;
        return $this;
    }

    /**
     * @param  string $Culture
     * @return PaymentCard
     */
    public function setCulture($Culture)
    {
        if ($Culture !== null && !Utils::isCulture($Culture)) {
            throw new \InvalidArgumentException('Culture is invalid');
        }

        $this->Culture = $Culture;
        return $this;
    }
}

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

class TransferRefund extends TimestampableModel
{
    /**
     * @var integer
     */
    protected $UserID;

    /**
     * @var integer
     */
    protected $TransferID;

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->TransferID
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
    public function getTransferID()
    {
        return $this->TransferID;
    }

    /**
     * @param  integer  $UserID
     * @return TransferRefund
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @param  integer  $TransferID
     * @return TransferRefund
     */
    public function setTransferID($TransferID)
    {
        $this->TransferID = $TransferID;
        return $this;
    }
}

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

abstract class TimestampableModel extends AbstractModel
{
    /**
     * @var integer
     */
    protected $CreationDate;

    /**
     * @var integer
     */
    protected $UpdateDate;

    /**
     * @return integer
     */
    public function getCreationDate()
    {
        if ($this->CreationDate instanceof DateTime) {
            return $this->CreationDate->format('U');
        }

        return $this->CreationDate;
    }

    /**
     * @return integer
     */
    public function getUpdateDate()
    {
        if ($this->UpdateDate instanceof DateTime) {
            return $this->UpdateDate->format('U');
        }

        return $this->UpdateDate;
    }

    /**
     * @param  mixed $CreationDate
     * @return mixed
     */
    public function setCreationDate($CreationDate)
    {
        if ($CreationDate instanceof DateTime) {
            $this->CreationDate = $CreationDate;
        } else {
            $this->CreationDate = new DateTime(sprintf('@%d', $CreationDate));
        }

        return $this;
    }

    /**
     * @param  mixed $UpdateDate
     * @return mixed
     */
    public function setUpdateDate($UpdateDate)
    {
        if ($UpdateDate instanceof DateTime) {
            $this->UpdateDate = $UpdateDate;
        } else {
            $this->UpdateDate = new DateTime(sprintf('@%d', $UpdateDate));
        }

        return $this;
    }
}

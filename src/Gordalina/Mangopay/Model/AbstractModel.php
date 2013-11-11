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

abstract class AbstractModel
{
    /**
     * @var integer
     */
    protected $ID;

    /**
     * @var integer
     */
    protected $Tag;

    /**
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return integer
     */
    public function getTag()
    {
        return $this->Tag;
    }

    /**
     * @param  integer $ID
     * @return User
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @param  string      $Tag
     * @return Beneficiary
     */
    public function setTag($Tag)
    {
        $this->Tag = $Tag;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getDefaultProperties();

        foreach ($properties as $field => $value) {
            $data[$field] = $this->{'get' . $field}();
        }

        return $data;
    }

    /**
     * @param  string $json
     * @return null
     */
    public function jsonUnserialize($json)
    {
        $this->update(json_decode($json));
    }

    /**
     * @param object $object
     */
    public function update($object)
    {
        foreach ($object as $key => $value) {
            $this->{'set' . $key}($value);
        }
    }
}

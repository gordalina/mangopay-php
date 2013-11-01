<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\ImmediateContribution;

use Gordalina\Mangopay\Model\Contribution;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateImmediateContribution extends RequestModel implements RequestInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'POST';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return '/immediate-contributions';
    }

    /**
     * @param  Contribution $contribution
     * @throws \InvalidArgumentException If $contribution is not valid
     */
    public function __construct(Contribution $contribution)
    {
        if ($contribution->isValidImmediateContribution() === false) {
            throw new \InvalidArgumentException("Contribution::isValidImmediateContribution() returned false");
        }

        $this->setModel($contribution);
    }
}

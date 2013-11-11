<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Request\ContributionByWithdrawal;

use Gordalina\Mangopay\Model\ContributionByWithdrawal;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestInterface;

class CreateContributionByWithdrawal extends RequestModel implements RequestInterface
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
        return '/contributions-by-withdrawal';
    }

    /**
     * @param  ContributionByWithdrawal  $contributionByWithdrawal
     * @throws \InvalidArgumentException If $contributionByWithdrawal is not valid
     */
    public function __construct(ContributionByWithdrawal $contributionByWithdrawal)
    {
        if ($contributionByWithdrawal->isValid() === false) {
            throw new \InvalidArgumentException("ContributionByWithdrawal::isValid() returned false");
        }

        $this->setModel($contributionByWithdrawal);
    }
}

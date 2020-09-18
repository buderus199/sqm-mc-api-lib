<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 4:22 PM
 * @file: Ecommerce.php
 */
class SqualoMailMC_Abstract
{
    /**
     * @var SqualoMailMC
     */
    protected $master;

    /**
     * @param SqualoMailMC $m
     */
    public function __construct(SqualoMailMC $m)
    {
        $this->master = $m;
    }
}
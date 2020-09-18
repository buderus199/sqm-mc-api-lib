<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 5/2/16 3:59 PM
 * @file: Ecommerce.php
 */
class SqualoMailMc_Ecommerce extends SqualoMailMc_Abstract
{
    /**
     * @var SqualoMailMc_EcommerceStore
     */
    public $stores;
    /**
     * @var SqualoMailMc_EcommerceCarts
     */
    public $carts;
    /**
     * @var SqualoMailMc_EcommerceCustomers
     */
    public $customers;
    /**
     * @var SqualoMailMc_EcommerceOrders
     */
    public $orders;
    /**
     * @var SqualoMailMc_EcommerceProducts
     */
    public $products;
    /**
     * @var SqualoMailMc_EcommercePromoRules
     */
    public $promoRules;
    /**
     * @var SqualoMailMc_EcommercePromoCodes
     */
    public $promoCodes;

}
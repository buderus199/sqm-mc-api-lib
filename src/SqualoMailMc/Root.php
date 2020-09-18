<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 1:18 PM
 * @file: Root.php
 */
class SqualoMailMc_Root extends SqualoMailMc_Abstract
{
    public function info($fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields)
        {
            $_params['fields'] = $fields;
        }
        if($excludeFields)
        {
            $_params['exclude_fields'] = $excludeFields;
        }
        return $this->master->call('',$_params,SqualoMailMc::GET);
    }
}
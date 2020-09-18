<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 5/9/16 2:21 PM
 * @file: AutomationRemovedSubscribers.php
 */
class SqualoMailMc_AutomationRemovedSubscribers extends SqualoMailMc_Abstract
{
    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @param $emailAddress         The list member’s email address.
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function add($workflowId,$emailAddress)
    {
        $_params = array('email_address'=>$emailAddress);
        $this->master->call('automations/'.$workflowId.'/removed-subscribers',$_params,SqualoMailMc::POST);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($workflowId)
    {
        $this->master->call('automations/'.$workflowId.'/removed-subscribers',null,SqualoMailMc::POST);
    }
}
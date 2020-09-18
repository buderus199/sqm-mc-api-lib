<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 3:47 PM
 * @file: Automation.php
 */
class SqualoMailMc_Automation extends SqualoMailMc_Abstract
{
    /**
     * @var SqualoMailMc_AutomationEmails
     */
    public $emails;
    /**
     * @var SqualoMailMc_AutomationRemovedSubscribers
     */
    public $removedSubscribers;

    /**
     * @param null $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param null $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        return $this->master->call('automations',$_params,SqualoMailMc::GET);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function get($workflowId)
    {
        return $this->master->call('automation/'.$workflowId,null, SqualoMailMc::GET);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function pause($workflowId)
    {
        return $this->master->call('automation/'.$workflowId.'/pause-all-emails',null, SqualoMailMc::POST);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function start($workflowId)
    {
        return $this->master->call('automation/'.$workflowId.'/start-all-emails',null, SqualoMailMc::POST);
    }
}
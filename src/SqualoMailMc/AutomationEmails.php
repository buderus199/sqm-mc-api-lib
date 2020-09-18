<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 5/2/16 4:12 PM
 * @file: AutomationEmails.php
 */
class SqualoMailMc_AutomationEmails extends SqualoMailMc_Abstract
{
    /**
     * @var SqualoMailMc_AutomationEmailsQuque
     */
    public $queue;

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($workflowId)
    {
        return $this->master->call('automation/'.$workflowId.'/emails',null, SqualoMailMc::GET);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @param $workflowEmailId      The unique id for the Automation workflow email.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function get($workflowId,$workflowEmailId)
    {
        return $this->master->call('automation/'.$workflowId.'/emails/'.$workflowEmailId,null, SqualoMailMc::GET);
    }

    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @param $workflowEmailId      The unique id for the Automation workflow email.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function pause($workflowId,$workflowEmailId)
    {
        return $this->master->call('automation/'.$workflowId.'/emails/'.$workflowEmailId.'/pause',null, SqualoMailMc::POST);
    }
    /**
     * @param $workflowId           The unique id for the Automation workflow.
     * @param $workflowEmailId      The unique id for the Automation workflow email.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function start($workflowId,$workflowEmailId)
    {
        return $this->master->call('automation/'.$workflowId.'/emails/'.$workflowEmailId.'/start',null, SqualoMailMc::POST);
    }
}
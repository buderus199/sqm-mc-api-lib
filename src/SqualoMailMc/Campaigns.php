<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 3:55 PM
 * @file: Campaigns.php
 */
class SqualoMailMc_Campaigns extends SqualoMailMc_Abstract
{
    /**
     * @var SqualoMailMc_CampaignsContent
     */
    public $content;
    /**
     * @var SqualoMailMc_CampaignsFeedback
     */
    public $feedback;
    /**
     * @var SqualoMailMc_CampaignsSendChecklist
     */
    public $sendChecklist;

    /**
     * @param string $type              There are four types of campaigns you can create in SqualoMail. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
     *                                  Possible Values:
     *                                  regular | plaintext| absplit | rss | variate
     * @param null $recipients          List settings for the campaign.
     * @param array $settings           The settings for your campaign, including subject, from name, reply-to address, and more.
     * @param null $variateSettings     The settings specific to A/B test campaigns.
     * @param null $tracking            The tracking options for a campaign.
     * @param null $rssOpts             RSS options for a campaign.
     * @param null $socialCard          The preview for the campaign, rendered by social networks like Facebook and Twitter. Learn more.
     * @param null $reportSummary       For sent campaigns, a summary of opens, clicks, and unsubscribes.
     * @param null $deliveryStatus      Updates on campaigns in the process of sending.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function add($type,$recipients=null,$settings,$variateSettings=null,$tracking=null,$rssOpts=null,$socialCard=null,
                            $reportSummary=null,$deliveryStatus=null)
    {
        $_params = array('type'=>$type,'settings'=>$settings);
        if($recipients) $_params['recipients'] = $recipients;
        if($variateSettings) $_params['variate_settings'] = $variateSettings;
        if($tracking) $_params['tracking'] = $tracking;
        if($rssOpts) $_params['rss_opts'] = $rssOpts;
        if($socialCard) $_params['social_card'] = $socialCard;
        if($reportSummary) $_params['report_summary'] = $reportSummary;
        if($deliveryStatus) $_params['delivery_status'] = $deliveryStatus;
        return $this->master->call('campaigns',$_params,SqualoMailMc::POST);
    }

    /**
     * @param null $fields              A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param null $excludeFields       A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param null $count               The number of records to return.
     * @param null $offset              The number of records from a collection to skip. Iterating over large collections with this parameter can be slow.
     * @param null $type                The campaign type.
     *                                  Possible Values:
     *                                  regular | plaintext| absplit | rss | variate
     * @param null $status              The status of the campaign.
     *                                  Possible Values:
     *                                  save | paused | schedule | sending | sent
     * @param null $beforeSendTime      Restrict the response to campaigns sent before the set time. We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param null $sinceSendTime       Restrict the response to campaigns sent after the set time. We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param null $beforeCreateTime    Restrict the response to campaigns created before the set time. We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param null $sinceCreateTime     Restrict the response to campaigns created after the set time. We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param null $listId              The unique id for the list.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($fields=null,$excludeFields=null,$count=null,$offset=null,$type=null,$status=null,
                            $beforeSendTime=null,$sinceSendTime=null,$beforeCreateTime=null,$sinceCreateTime=null,
                            $listId=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        if($count) $_params['count'] = $count;
        if($offset) $_params['offset'] = $offset;
        if($type) $_params['type'] = $type;
        if($status) $_params['status'] = $status;
        if($beforeSendTime) $_params['before_send_time'] = $beforeSendTime;
        if($sinceSendTime) $_params['since_send_time'] = $sinceSendTime;
        if($beforeCreateTime) $_params['before_create_time'] = $beforeCreateTime;
        if($sinceCreateTime) $_params['since_create_time'] = $sinceCreateTime;
        if($listId) $_params['list_id'] = $listId;
        return $this->master->call('campaigns',$_params,SqualoMailMc::GET);
    }

    /**
     * @param string $campaignId        The unique id for the campaign.
     * @param null $fields              A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param null $excludeFields       A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function get($campaignId,$fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        return $this->master->call('campaigns/'.$campaignId,$_params,SqualoMailMc::GET);
    }

    /**
     * @param string $campaignId        The unique id for the campaign.
     * @param string $type              There are four types of campaigns you can create in SqualoMail. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
     *                                  Possible Values:
     *                                  regular | plaintext| absplit | rss | variate
     * @param null $recipients          List settings for the campaign.
     * @param array $settings           The settings for your campaign, including subject, from name, reply-to address, and more.
     * @param null $variateSettings     The settings specific to A/B test campaigns.
     * @param null $tracking            The tracking options for a campaign.
     * @param null $rssOpts             RSS options for a campaign.
     * @param null $socialCard          The preview for the campaign, rendered by social networks like Facebook and Twitter. Learn more.
     * @param null $reportSummary       For sent campaigns, a summary of opens, clicks, and unsubscribes.
     * @param null $deliveryStatus      Updates on campaigns in the process of sending.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function modify($campaignId,$type,$recipients=null,$settings,$variateSettings=null,$tracking=null,$rssOpts=null,$socialCard=null,
                           $reportSummary=null,$deliveryStatus=null)
    {
        $_params = array('type'=>$type,'settings'=>$settings);
        if($recipients) $_params['recipients'] = $recipients;
        if($variateSettings) $_params['variate_settings'] = $variateSettings;
        if($tracking) $_params['tracking'] = $tracking;
        if($rssOpts) $_params['rss_opts'] = $rssOpts;
        if($socialCard) $_params['social_card'] = $socialCard;
        if($reportSummary) $_params['report_summary'] = $reportSummary;
        if($deliveryStatus) $_params['delivery_status'] = $deliveryStatus;
        return $this->master->call('campaigns/'.$campaignId,$_params,SqualoMailMc::PATCH);
    }

    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function delete($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId,null,SqualoMailMc::DELETE);
    }

    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function cancelSend($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/cancel-send',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function pause($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/pause',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function replicate($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/replicate',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function resume($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/resume',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function schedule($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/schedule',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function send($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/send',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function test($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/test',null,SqualoMailMc::POST);
    }
    /**
     * @param string $campaignId        The unique id for the campaign.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function unschedule($campaignId)
    {
        return $this->master->call('campaigns/'.$campaignId.'/actions/unschedule',null,SqualoMailMc::POST);
    }

}
<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/27/16 4:36 PM
 * @file: SqualoMailMc.php
 */

require_once 'SqualoMailMc/Abstract.php';
require_once 'SqualoMailMc/Root.php';
require_once 'SqualoMailMc/Automation.php';
require_once 'SqualoMailMc/AutomationEmails.php';
require_once 'SqualoMailMc/AutomationEmailsQueue.php';
require_once 'SqualoMailMc/AutomationRemovedSubscribers.php';
require_once 'SqualoMailMc/Exceptions.php';
require_once 'SqualoMailMc/AuthorizedApps.php';
require_once 'SqualoMailMc/BatchOperations.php';
require_once 'SqualoMailMc/CampaignFolders.php';
require_once 'SqualoMailMc/Campaigns.php';
require_once 'SqualoMailMc/CampaignsContent.php';
require_once 'SqualoMailMc/CampaignsFeedback.php';
require_once 'SqualoMailMc/CampaignsSendChecklist.php';
require_once 'SqualoMailMc/Conversations.php';
require_once 'SqualoMailMc/ConversationsMessages.php';
require_once 'SqualoMailMc/Ecommerce.php';
require_once 'SqualoMailMc/EcommerceStores.php';
require_once 'SqualoMailMc/EcommerceCarts.php';
require_once 'SqualoMailMc/EcommerceCustomers.php';
require_once 'SqualoMailMc/EcommerceOrders.php';
require_once 'SqualoMailMc/EcommerceOrdersLines.php';
require_once 'SqualoMailMc/EcommerceProducts.php';
require_once 'SqualoMailMc/EcommerceProductsVariants.php';
require_once 'SqualoMailMc/EcommercePromoRules.php';
require_once 'SqualoMailMc/EcommercePromoCodes.php';
require_once 'SqualoMailMc/FileManagerFiles.php';
require_once 'SqualoMailMc/FileManagerFolders.php';
require_once 'SqualoMailMc/Lists.php';
require_once 'SqualoMailMc/ListsAbuseReports.php';
require_once 'SqualoMailMc/ListsActivity.php';
require_once 'SqualoMailMc/ListsClients.php';
require_once 'SqualoMailMc/ListsGrowthHistory.php';
require_once 'SqualoMailMc/ListsInterestCategory.php';
require_once 'SqualoMailMc/ListsInterestCategoryInterests.php';
require_once 'SqualoMailMc/ListsMembers.php';
require_once 'SqualoMailMc/ListsMembersActivity.php';
require_once 'SqualoMailMc/ListsMembersGoals.php';
require_once 'SqualoMailMc/ListsMembersNotes.php';
require_once 'SqualoMailMc/ListsMergeFields.php';
require_once 'SqualoMailMc/ListsSegments.php';
require_once 'SqualoMailMc/ListsSegmentsMembers.php';
require_once 'SqualoMailMc/ListsWebhooks.php';
require_once 'SqualoMailMc/Reports.php';
require_once 'SqualoMailMc/ReportsCampaignAdvice.php';
require_once 'SqualoMailMc/ReportsClickReports.php';
require_once 'SqualoMailMc/ReportsClickReportsMembers.php';
require_once 'SqualoMailMc/ReportsDomainPerformance.php';
require_once 'SqualoMailMc/ReportsEapURLReport.php';
require_once 'SqualoMailMc/ReportsEmailActivity.php';
require_once 'SqualoMailMc/ReportsLocation.php';
require_once 'SqualoMailMc/ReportsSentTo.php';
require_once 'SqualoMailMc/ReportsSubReports.php';
require_once 'SqualoMailMc/ReportsUnsubscribes.php';
require_once 'SqualoMailMc/TemplateFolders.php';
require_once 'SqualoMailMc/Templates.php';
require_once 'SqualoMailMc/TemplatesDefaultContent.php';

class SqualoMailMc
{
    protected $_apiKey;
    protected $_ch = null;
    protected $_root    = 'https://api.squalomail.com/mc/3.0';
    protected $_debug   = false;

    const POST      = 'POST';
    const GET       = 'GET';
    const PATCH     = 'PATCH';
    const DELETE    = 'DELETE';
    const PUT       = 'PUT';

    const SUBSCRIBED = 'subscribed';
    const UNSUBSCRIBED = 'unsubscribed';

    /**
     * SqualoMailMc constructor.
     * @param string $apiKey
     * @param array $opts
     * @param string $userAgent
     */
    public function __construct()
    {
        $this->_ch = curl_init();

        if (isset($opts['CURLOPT_FOLLOWLOCATION']) && $opts['CURLOPT_FOLLOWLOCATION'] === true) {
            curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, true);
        }
        curl_setopt($this->_ch, CURLOPT_USERAGENT, 'SqualoMail-Mc-Api-PHP/3.0.0');
        curl_setopt($this->_ch, CURLOPT_HEADER, false);
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->_ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($this->_ch, CURLOPT_TIMEOUT, 10);

        $this->root                                         = new SqualoMailMc_Root($this);
        $this->authorizedApps                               = new SqualoMailMc_AuthorizedApps($this);
        $this->automation                                   = new SqualoMailMc_Automation($this);
        $this->automation->emails                           = new SqualoMailMc_AutomationEmails($this);
        $this->automation->emails->queue                    = new SqualoMailMc_AutomationEmailsQuque($this);
        $this->automation->removedSubscribers               = new SqualoMailMc_AutomationRemovedSubscribers($this);
        $this->batchOperation                               = new SqualoMailMc_BatchOperations($this);
        $this->campaignFolders                              = new SqualoMailMc_CampaignFolders($this);
        $this->campaigns                                    = new SqualoMailMc_Campaigns($this);
        $this->campaigns->content                           = new SqualoMailMc_CampaignsContent($this);
        $this->campaigns->feedback                          = new SqualoMailMc_CampaignsFeedback($this);
        $this->campaigns->sendChecklist                     = new SqualoMailMc_CampaignsSendChecklist($this);
        $this->conversations                                = new SqualoMailMc_Conversations($this);
        $this->conversations->messages                      = new SqualoMailMc_ConversationsMessages($this);
        $this->ecommerce                                    = new SqualoMailMc_Ecommerce($this);
        $this->ecommerce->stores                            = new SqualoMailMc_EcommerceStore($this);
        $this->ecommerce->carts                             = new SqualoMailMc_EcommerceCarts($this);
        $this->ecommerce->customers                         = new SqualoMailMc_EcommerceCustomers($this);
        $this->ecommerce->orders                            = new SqualoMailMc_EcommerceOrders($this);
        $this->ecommerce->orders->lines                     = new SqualoMailMc_EcommerceOrdersLines($this);
        $this->ecommerce->products                          = new SqualoMailMc_EcommerceProducts($this);
        $this->ecommerce->products->variants                = new SqualoMailMc_EcommerceProductsVariants($this);
        $this->ecommerce->promoRules                        = new SqualoMailMc_EcommercePromoRules($this);
        $this->ecommerce->promoCodes                        = new SqualoMailMc_EcommercePromoCodes($this);
        $this->fileManagerFiles                             = new SqualoMailMc_FileManagerFiles($this);
        $this->fileManagerFolders                           = new SqualoMailMc_FileManagerFolders($this);
        $this->lists                                        = new SqualoMailMc_Lists($this);
        $this->lists->abuseReports                          = new SqualoMailMc_ListsAbuseReports($this);
        $this->lists->activity                              = new SqualoMailMc_ListsActivity($this);
        $this->lists->clients                               = new SqualoMailMc_ListsClients($this);
        $this->lists->growthHistory                         = new SqualoMailMc_ListsGrowthHistory($this);
        $this->lists->interestCategory                      = new SqualoMailMc_ListsInterestCategory($this);
        $this->lists->interestCategory->interests           = new SqualoMailMc_ListInterestCategoryInterests($this);
        $this->lists->members                               = new SqualoMailMc_ListsMembers($this);
        $this->lists->members->memberActivity               = new SqualoMailMc_ListsMembersActivity($this);
        $this->lists->members->memberGoal                   = new SqualoMailMc_ListsMembersGoals($this);
        $this->lists->members->memberNotes                  = new SqualoMailMc_ListsMembersNotes($this);;
        $this->lists->mergeFields                           = new SqualoMailMc_ListsMergeFields($this);
        $this->lists->segments                              = new SqualoMailMc_ListsSegments($this);
        $this->lists->segments->segmentMembers              = new SqualoMailMc_ListsSegmentsMembers($this);
        $this->lists->webhooks                              = new SqualoMailMc_ListsWebhooks($this);
        $this->reports                                      = new SqualoMailMc_Reports($this);
        $this->reports->campaignAdvice                      = new SqualoMailMc_ReportsCampaignAdvice($this);
        $this->reports->clickReports                        = new SqualoMailMc_ReportsClickReports($this);
        $this->reports->clickReports->clickReportMembers    = new SqualoMailMc_ReportsClickReportsMembers($this);
        $this->reports->domainPerformance                   = new SqualoMailMc_ReportsDomainPerformance($this);
        $this->reports->eapURLReport                        = new SqualoMailMc_ReportsEapURLReport($this);
        $this->reports->emailActivity                       = new SqualoMailMc_ReportsEmailActivity($this);
        $this->reports->location                            = new SqualoMailMc_ReportsLocation($this);
        $this->reports->sentTo                              = new SqualoMailMc_ReportsSentTo($this);
        $this->reports->subReports                          = new SqualoMailMc_ReportsSubReports($this);
        $this->reports->unsubscribes                        = new SqualoMailMc_ReportsUnsubscribes($this);
        $this->templateFolders                              = new SqualoMailMc_TemplateFolders($this);
        $this->templates                                    = new SqualoMailMc_Templates($this);
        $this->templates->defaultContent                    = new SqualoMailMc_TemplatesDefaultContent($this);
    }

    public function setApiKey($apiKey)
    {
        if (!$this->_ch) {
            $this->init();
        }
        $this->_apiKey   = $apiKey;
        $this->_root = rtrim($this->_root, '/') . '/';
        curl_setopt($this->_ch, CURLOPT_USERPWD, "noname:" . $this->_apiKey);
    }

    /**
     * @return string
     */
    public function getAdminUrl()
    {
        $url = rtrim($this->_root, '/') . '/';
        return $url;
    }

    public function setUserAgent($userAgent)
    {
        if (!$this->_ch) {
            $this->init();
        }
        curl_setopt($this->_ch, CURLOPT_USERAGENT, $userAgent);
    }

    public function call($url,$params,$method=SqualoMailMc::GET)
    {
        $hasParams = true;
        if(is_array($params)&&count($params)==0||$params == null)
        {
            $hasParams = false;
        }
        if($hasParams&&$method!=SqualoMailMc::GET)
        {
            $params = json_encode($params);
        }

        $ch = $this->_ch;
        if($hasParams&&$method!=SqualoMailMc::GET)
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, null);
            if ($hasParams) {
                $_params = http_build_query($params);
                $url .= '?' . $_params;
            }
        }
        curl_setopt($ch, CURLOPT_URL, $this->_root . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, $this->_debug);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,$method);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);


        $response_body = curl_exec($ch);

        $info = curl_getinfo($ch);
        if(curl_error($ch)) {
            throw new SqualoMailMc_HttpError($url, $method, $params, '', curl_error($ch));
        }
        $result = json_decode($response_body, true);

        if(floor($info['http_code'] / 100) >= 4) {
            if(is_array($result)) {
                $detail = array_key_exists('detail', $result) ? $result['detail'] : '';
                $errors = array_key_exists('errors', $result) ? $result['errors'] : null;
                $title = array_key_exists('title', $result) ? $result['title'] : '';
                throw new SqualoMailMc_Error($this->_root . $url, $method, $params, $title, $detail, $errors);
            } else {
                throw new SqualoMailMc_Error($this->_root . $url, $method, $params, $result);
            }
        }

        return $result;
    }
}
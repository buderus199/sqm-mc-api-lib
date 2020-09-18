<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 5/2/16 4:48 PM
 * @file: Reports.php
 */
class SqualoMailMc_Reports extends SqualoMailMc_Abstract
{
    /**
     * @var SqualoMailMc_ReportsCampaignAdvice
     */
    public $campaignAdvice;
    /**
     * @var SqualoMailMc_ReportsClickReports
     */
    public $clickReports;
    /**
     * @var SqualoMailMc_ReportsDomainPerformance
     */
    public $domainPerformance;
    /**
     * @var ReportsEapURLReport
     */
    public $eapURLReport;
    /**
     * @var SqualoMailMc_ReportsEmailActivity
     */
    public $emailActivity;
    /**
     * @var ReportsLocation
     */
    public $location;
    /**
     * @var SqualoMailMc_ReportsSentTo
     */
    public $sentTo;
    /**
     * @var SqualoMailMc_ReportsSubReports
     */
    public $subReports;
    /**
     * @var SqualoMailMc_ReportsUnsubscribes
     */
    public $unsubscribes;
}
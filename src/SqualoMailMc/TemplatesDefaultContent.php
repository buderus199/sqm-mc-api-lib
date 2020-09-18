<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 5/2/16 5:24 PM
 * @file: TemplatesDefaultContent.php
 */

class SqualoMailMc_TemplatesDefaultContent extends SqualoMailMc_Abstract
{
    /**
     * @param int $id                   The template id.
     * @param string[] $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param string[] $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return mixed
     * @throws \SqualoMailMc_Error
     * @throws \SqualoMailMc_HttpError
     */
    public function get($id, $fields = null, $excludeFields = null)
    {
        $params = array();

        if ($fields) $params['fields'] = $fields;
        if ($excludeFields) $params['exclude_fields'] = $excludeFields;

        return $this->master->call('templates/' . $id . '/default-content', $params, \SqualoMailMc::GET);
    }
}

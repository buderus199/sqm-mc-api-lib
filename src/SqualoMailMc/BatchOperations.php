<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 3:51 PM
 * @file: BatchOperations.php
 */
class SqualoMailMc_BatchOperations extends SqualoMailMc_Abstract
{
    /**
     * @param $operations       String An array of objects that describes operations to perform.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function add($operations)
    {
        return $this->master->call('batches',$operations,SqualoMailMc::POST);
    }

    /**
     * @param $id               The unique id for the batch operation.
     * @param $fields           A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param $excludeFields    A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function status($id,$fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        return $this->master->call('batches/'.$id,$_params,SqualoMailMc::GET);
    }

    /**
     * @param $fields           A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param $excludeFields    A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param $count            The number of records to return.
     * @param $offset           The number of records from a collection to skip. Iterating over large collections with this parameter can be slow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($fields=null,$excludeFields=null,$count=null,$offset=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        if($count) $_params['count'] = $count;
        if($offset) $_params['offset'] = $offset;
        return $this->master->call('batches',$_params,SqualoMailMc::GET);
    }
}
<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Matej Tancek <matej.tancek@gmail.com>
 * @copyright Matej Tancek (https://www.rsmt.si)
 * @file: EcommerceProductCategories.php
 */
class SqualoMailMc_EcommerceProductCategories extends SqualoMailMc_Abstract
{
    /**
     * @param $storeId              The store id.
     * @param null $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with
     *                              dot notation.
     * @param null $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with
     *                              dot notation.
     * @param null $count           The number of records to return.
     * @param null $offset          The number of records from a collection to skip. Iterating over large collections
     *                              with this parameter can be slow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($storeId,$fields=null,$excludeFields=null,$count=null,$offset=null)
    {
        $_params=array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        if($count) $_params['count'] = $count;
        if($offset) $_params['offset'] = $offset;
        return $this->master->call('ecommerce/stores/'.$storeId.'/categories',$_params,SqualoMailMc::GET);
    }

    /**
     * @param $storeId              The store id.
     * @param $categoryId           The id for the product category of a store.
     * @param null $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with
     *                              dot notation.
     * @param null $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with
     *                              dot notation.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function get($storeId,$categoryId,$fields=null,$excludeFields=null)
    {
        $_params=array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        return $this->master->call('ecommerce/stores/'.$storeId.'/categories/'.$categoryId,$_params,SqualoMailMc::GET);
    }
    
    /**
     * @param $storeId                      The store id.
     * @param $id                           A unique identifier for the product category.
     * @param $handle                       The handle of a product category.
     * @param $title                        The title of a product category.
     * @param $productsIds                  The list of product ids associated with a category.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function add($storeId,$id,$handle,$title,$productsIds)
    {
        $_params=array('id'=>$id,'title'=>$title,'handle'=>$handle,'product_ids'=>$productsIds);
        return $this->master->call('ecommerce/stores/'.$storeId.'/categories',$_params,SqualoMailMc::POST);
    }
    
    /**
     * @param $storeId                      The store id.
     * @param $id                           A unique identifier for the product category.
     * @param null $handle                  The handle of a product category.
     * @param null $title                   The title of a product category.
     * @param null $productsIds             The list of product ids associated with a category.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function modify($storeId,$categoryId,$handle=null,$title=null,$productsIds=null)
    {
        $_params=array();
        if($handle) $_params['handle'] = $handle;
        if($title) $_params['title'] = $title;
        if($productsIds) $_params['products_ids'] = $productsIds;
        return $this->master->call('ecommerce/stores/'.$storeId.'/categories/'.$categoryId,$_params,SqualoMailMc::PUT);
    }

    /**
     * @param $storeId              The store id.
     * @param $categoryId            The id for the product category of a store.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function delete($storeId,$categoryId)
    {
        return $this->master->call('ecommerce/stores/'.$storeId.'/categories/'.$categoryId,null,SqualoMailMc::DELETE);
    }
}
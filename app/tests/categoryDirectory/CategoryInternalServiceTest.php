<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 2:15 PM
 */

namespace tests\categoryDirectory;


use App\DomainLogic\CategoryDirectory\Category;
use App\DomainLogic\CategoryDirectory\CategoryInternalService;
use App\DomainLogic\SuperCategoryDirectory\SuperCategory;
use Illuminate\Foundation\Testing\TestCase;

class CategoryInternalServiceTest extends \TestCase {

    /**
     *Test method returns new category instance if attributes are valid.
     *
     */
    public function test_categoryInternalService_store_method_returns_new_category_if_attributes_are_correct()
    {
        //good store response
        $storeResponse = $this->goodStoreResponse();

        //assert instance of category model
        $categoryService = new CategoryInternalService();
        $this->assertTrue($categoryService->isModelInstance($storeResponse));

        //cleanup
        Category::destroy($storeResponse->id);
    }

    /**
     *Test method saves new category instance in database if attributes are valid.
     */
    public function test_categoryInternalService_store_method_saves_new_category_in_database_if_attributes_are_correct()
    {
        //good store response
        $storeResponse = $this->goodStoreResponse();

        //assert instance is in database
        $fromDB = Category::find($storeResponse->id);

        $categoryService = new CategoryInternalService();
        $this->assertTrue($categoryService->isModelInstance($fromDB));

        //cleanup
        Category::destroy($storeResponse->id);

    }


    /**
     *Test method returns error message if superCategory referenced doesn't exist.
     */
    public function test_categoryInternalService_store_method_returns_error_message_if_superCategory_doesnt_exist()
    {
        //service instance
        $categoryService = new CategoryInternalService();
        //attributes with bad superCategory id
        $badSuperCategoryId = [
            'title' => 'someTitle',
            'superCategory_id' => 'aaa'
        ];

        //call store method
        $storeResponseBad = $categoryService->store($badSuperCategoryId);

        //assert error message
        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseBad);

    }


    /**
     *Test method returns error message if attributenames passed to store method are invalid.
     */
    public function test_categoryInternalService_store_method_returns_error_message_if_attributeNames_are_invalid()
    {
        //service instance
        $categoryService = new CategoryInternalService();

        //attributes with bad attributename, but good superCategoryId
        $superCategory = SuperCategory::create(['title' => 'someTitle']);
        $badAttributeName = [
            'wrong' => 'someTitle',
            'superCategory_id' => $superCategory->id,
        ];

        //call store method
        $storeResponseBad = $categoryService->store($badAttributeName);

        //assert error message
        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseBad);

        //cleanup
        SuperCategory::destroy($superCategory->id);
    }







    public function goodStoreResponse()
    {
        //service instance
        $categoryService = new CategoryInternalService();

        //good attributes
        $superCategory = SuperCategory::create(['title' => 'someTitle']);

        $good = [
            'title' => 'categoryInternalServiceGoodStoreResponseMethod',
            'superCategory_id' => $superCategory->id,
        ];

        //call store method
        $storeResponse = $categoryService->store($good);

        SuperCategory::destroy($superCategory->id);

        return $storeResponse;

    }


}

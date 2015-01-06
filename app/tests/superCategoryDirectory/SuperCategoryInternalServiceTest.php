<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 6:20 PM
 */

namespace tests\superCategoryDirectory;


use App\DomainLogic\SuperCategoryDirectory\SuperCategory;
use App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService;
use Illuminate\Foundation\Testing\TestCase;

class SuperCategoryInternalServiceTest extends \TestCase {

    /**
     *Test method creates and stores a new superCategory model instance in database if attributes passed are valid.
     * Otherwise will should return an error message.
     */
    public function test_superCategoryInternalService_store_method()
    {
        //service instance
        $superCategoryService = new SuperCategoryInternalService();

        //good attributes
        $good = [
            'title' => 'superCategoryInternalServiceStoreMethodTest'
        ];

        //call store method on good attributes
        $storeResponse = $superCategoryService->store($good);

        //assert response is a new instance
        $this->assertTrue($superCategoryService->isModelInstance($storeResponse));

        //prove its indeed in database
        $proofInstanceIsInDB = SuperCategory::find($storeResponse->id);
        $this->assertEquals($good['title'], $proofInstanceIsInDB->title);
        $this->assertTrue($superCategoryService->isModelInstance($proofInstanceIsInDB));

        //bad attributes to invoke error message
        $bad = [
            'wrong' => 'someTitle'
        ];

        //call store method on bad attributes
        $storeResponseBad = $superCategoryService->store($bad);

        //assert error message
        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseBad);

        //cleanup
        SuperCategory::destroy($storeResponse->id);
    }

    
    public function test_superCategoryInternalService_show_method()
    {

    }

    public function test_superCategoryInternalService_update_method()
    {

    }

    public function test_superCategoryInternalService_destroy_method()
    {

    }

    public function test_superCategoryInternalService_index_method()
    {

    }
}

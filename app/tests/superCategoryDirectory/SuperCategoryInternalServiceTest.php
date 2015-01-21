<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 6:20 PM
 */

namespace tests\superCategoryDirectory;


use App\DomainLogic\CategoryDirectory\Category;
use App\DomainLogic\SuperCategoryDirectory\SuperCategory;
use App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService;
use Illuminate\Foundation\Testing\TestCase;

class SuperCategoryInternalServiceTest extends \TestCase {

    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceStoreTests
     * @group internalServiceTests
     *
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


    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceStoreTests
     * @group internalServiceTests
     *
     *Test method retrieves specified superCategory instance if it exists, otherwise should return error message.
     */
    public function test_superCategoryInternalService_show_method()
    {
        //service instance
        $superCategoryService = new SuperCategoryInternalService();

        //create and store new superCategory instance
        $attributes = [
            'title' => 'superCategoryInternalServiceShowMethodTest',
        ];

        $storeResponse = $superCategoryService->store($attributes);
        $idToUseForInstance = $storeResponse->id;
        //assert its indeed in database
        $proofInstanceIsInDB = SuperCategory::find($idToUseForInstance);
        $this->assertTrue($superCategoryService->isModelInstance($proofInstanceIsInDB));
        $this->assertEquals($attributes['title'], $proofInstanceIsInDB->title);

        //call show method
        $showResponse = $superCategoryService->show($idToUseForInstance);

        //assert attributes and type of show response
        $this->assertTrue($superCategoryService->isModelInstance($showResponse));
        $this->assertEquals($attributes['title'], $showResponse->title);

        //call show method on bad id
        $showResponseBad = $superCategoryService->show('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $showResponseBad);

        //cleanup
        SuperCategory::destroy($idToUseForInstance);
    }


    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceUpdateTests
     * @group internalServiceTests
     *
     *Test method updates a superCategory model instance if it exists and the attributes are valid.
     * Otherwise should return an error message.
     */
    public function test_superCategoryInternalService_update_method()
    {
        //service instance
        $superCategoryService = new SuperCategoryInternalService();

        //create and store superCategory instance
        $attributes = [
            'title' => 'superCategoryInternalServiceUpdateMethodTest'
        ];

        $storeResponse = $superCategoryService->store($attributes);
        $idToUseForInstance = $storeResponse->id;

        //assert its indeed in database
        $proofInstanceIsInDB = SuperCategory::find($idToUseForInstance);

            //type
            $this->assertTrue($superCategoryService->isModelInstance($proofInstanceIsInDB));

            //attribute
            $this->assertEquals($attributes['title'], $proofInstanceIsInDB->title);

        //new attributes
        $newAttributes = [
            'title' => 'superCategoryInternalServiceUpdateMethodTest2'
        ];

        //call update method with new attributes
        $updateResponse = $superCategoryService->update($idToUseForInstance, $newAttributes);

        //assert changes
        $proofInstanceWasUpdated = SuperCategory::find($idToUseForInstance);
            //type
            $this->assertTrue($superCategoryService->isModelInstance($proofInstanceWasUpdated));

            //attribute
            $this->assertEquals($newAttributes['title'], $proofInstanceWasUpdated->title);

        //bad attributes
        $badAttributes = [
            'wrong' => 'someTitle',
        ];

        //call update method on bad attributes
        $updateResponseBadAttributes = $superCategoryService->update($idToUseForInstance, $badAttributes);

        //call update method on bad id and good attributes
        $updateResponseBadModelId = $superCategoryService->update('aaa', $newAttributes);

        //assert error messages
        $this->assertEquals('Invalid attributes sent to update method.', $updateResponseBadAttributes);
        $this->assertEquals('Model not found.', $updateResponseBadModelId);

        //cleanup
        SuperCategory::destroy($idToUseForInstance);
    }

    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceDestroyTests
     * @group internalServiceTests
     */
    public function test_superCategoryInternalService_destroy_method()
    {
        //service instance
        $superCategoryService = new SuperCategoryInternalService();

        //create and store new superCategory instance
        $attributes = [
            'title' => 'superCategoryInternalServiceDestoryMethodTest',
        ];

        $storeResponse = $superCategoryService->store($attributes);
        $idToUseForInstance = $storeResponse->id;

        //assert its indeed in database
        $proofInstanceIsInDB = SuperCategory::find($idToUseForInstance);

            //type
            $this->assertTrue($superCategoryService->isModelInstance($proofInstanceIsInDB));

            //attribute
            $this->assertEquals($attributes['title'], $proofInstanceIsInDB->title);

        //call destroy method
        $destroyResponse = $superCategoryService->destroy($idToUseForInstance);

        //assert instance is no longer in database
        $proofInstanceIsNOTInDB = SuperCategory::find($idToUseForInstance);

            //null
            $this->assertEquals(null, $proofInstanceIsNOTInDB);

        //call destroy on bad id
        $destroyResponseBadId = $superCategoryService->destroy('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $destroyResponseBadId);

    }

    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceIndexTests
     * @group internalServiceTests
     */
    public function test_superCategoryInternalService_index_method()
    {
        //service instance
        $superCategoryService = new SuperCategoryInternalService();

        //fake superCategory data
        $superCategories = [];
        foreach(range(1, 20) as $index)
        {
            array_push($superCategories,SuperCategory::create([
                'title' => 'superCategoryNumber'. $index,
            ]));
        }
        //pagination count
        $paginationCount = 6;

        //pagination class
        $paginationClass = 'Illuminate\Pagination\Paginator';

        //call index method
        $indexResponse = $superCategoryService->index($paginationCount);

        //assert response is instance of pagination class
        $this->assertEquals(get_class($indexResponse), $paginationClass);

        //assert amount of items matches pagination count
        $this->assertEquals(count($indexResponse), $paginationCount);

        //cleanup
        foreach($superCategories as $superCategory)
        {
            SuperCategory::destroy($superCategory->id);
        }
    }

    /**
     * @group superCategoryGlobalTests
     * @group superCategoryInternalServiceTests
     * @group superCategoryInternalServiceRelationshipTests
     * @group internalServiceTests
     * @group internalServiceRelationshipTests
     */
    public function test_show_method_return_subjectModel_with_is_children()
    {
        $subCategory = \App\DomainLogic\SuperCategoryDirectory\SuperCategory::create([
            'title' => 'testSuperCategory',
        ]);

        $categoryModels = [];
        foreach(range(1,10) as $index)
        {
            $category = \App\DomainLogic\CategoryDirectory\Category::create([
                'title' => 'category'.$index,
                'superCategory_id' => $subCategory->id,
            ]);

            array_push($categoryModels, $category);
        }

        $fromDB  = \App\DomainLogic\SuperCategoryDirectory\SuperCategory::find($subCategory->id);

        $this->assertEquals(count($categoryModels), count($fromDB->categories));


        SuperCategory::destroy($subCategory->id);
        foreach($categoryModels as $category)
        {
            Category::destroy($category->id);
        }

    }

}

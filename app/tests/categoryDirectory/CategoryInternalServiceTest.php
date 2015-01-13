<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 2:15 PM
 */

namespace tests\categoryDirectory;


use App\Base\InternalServiceTestLibrary;
use App\DomainLogic\CategoryDirectory\Category;
use App\DomainLogic\CategoryDirectory\CategoryInternalService;
use App\DomainLogic\SkillDirectory\Skill;
use App\DomainLogic\SuperCategoryDirectory\SuperCategory;
use Illuminate\Foundation\Testing\TestCase;

class CategoryInternalServiceTest extends InternalServiceTestLibrary {

    /***********************************************************************************************************/
    /*                                          Store method tests                                              */
    /***********************************************************************************************************/
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


    /***********************************************************************************************************/
    /*                                          Show method tests                                              */
    /***********************************************************************************************************/


    /**
     *Test method returns correct class instance if id is valid.
     */
    public function test_categoryInternalService_show_method_returns_instance_of_correct_class_if_id_is_valid()
    {
        //service instance
        $categoryService = new CategoryInternalService();

        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();

        //call show method
        $showResponse = $categoryService->show($storeResponse->id);

        //assert correct class
        $this->assertTrue($categoryService->isModelInstance($showResponse));

        //cleanup
        Category::destroy($storeResponse->id);
    }


    /**
     *Test method returns correct category instance if id is valid.
     */
    public function test_categoryInternalService_show_method_returns_correct_instance_if_id_is_valid()
    {

        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();

        //call show method
        $showResponse = $this->service->show($storeResponse->id);

        //assert correct instance by asserting attributes
        $this->assertEquals($storeResponse->title, $showResponse->title);

        //cleanup
        Category::destroy($storeResponse->id);

    }

    /**
     *Test method returns error message if id is invalid.
     */
    public function test_categoryInternalService_show_method_returns_error_message_if_id_is_invalid()
    {
        //call show method on bad id
        $showResponseBad = $this->service->show('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $showResponseBad);

    }




    public function test_show_method_return_subjectModel_with_is_children()
    {
        $category = \App\DomainLogic\CategoryDirectory\Category::create([
            'title' => 'testCategory',
        ]);

        $skillsModels = [];
        foreach(range(1,10) as $index)
        {
            $skill = \App\DomainLogic\SkillDirectory\Skill::create([
                'title' => 'skill'.$index,
                'category_id' => $category->id,
            ]);

            array_push($skillsModels, $skill);
        }

        $fromDB  = \App\DomainLogic\CategoryDirectory\Category::find($category->id);

        $this->assertEquals(count($skillsModels), count($fromDB->skills));


        Category::destroy($category->id);
        foreach($skillsModels as $skill)
        {
            Skill::destroy($skill->id);
        }

    }

    /***********************************************************************************************************/
    /*                                          Update method tests                                              */
    /***********************************************************************************************************/


    /**
     *Test update method returns instance of category class if attributes are correct.
     */
    public function test_categoryInternalService_update_method_returns_instance_of_correct_class_if_attributes_are_correct()
    {
        //service instance
        $categoryService = new CategoryInternalService();

        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();

        //new attributes and new id
        $newAttributes = $this->returnGoodAttributes();

        //call update method
        $updateResponse = $categoryService->update($storeResponse->id, $newAttributes);

        //assert instance of category class returned
        $this->assertTrue($categoryService->isModelInstance($updateResponse));

        //cleanup
        Category::destroy($storeResponse->id);
        SuperCategory::destroy($newAttributes['superCategory_id']);
    }


    /**
     *Test update method returns update instance if attributes are correct.
     */
    public function test_categoryInternalService_update_method_returns_updated_instance_if_attributes_are_correct()
    {
        //service instance
        $categoryService = new CategoryInternalService();

        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();
        $idToUseForInstance = $storeResponse->id;
        //new attributes and id
        $newAttributes = $this->returnGoodAttributes();

        //call update method
        $updateResponse = $categoryService->update($idToUseForInstance, $newAttributes);

        //assert instance attributes matches new attributes
        foreach($newAttributes as $attributeName => $attributeValue)
        {
            $this->assertEquals($attributeValue, $updateResponse->$attributeName);
        }

        //cleanup
        SuperCategory::destroy($newAttributes['superCategory_id']);
        Category::destroy($idToUseForInstance);
    }

    /**
     *Test update method saves changes to database.
     */
    public function test_categoryInternalService_update_method_saves_changes_in_database_if_attributes_are_correct()
    {
        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();
        $idToUseForInstance = $storeResponse->id;

        //new attributes
        $newAttributes = $this->returnGoodAttributes();

        //call update method with new attributes
        $updateResponse = $this->service->update($idToUseForInstance, $newAttributes);

        //retrieve same instance from database
        $fromDB = Category::find($idToUseForInstance);

        //assert attributes match new attributes
        foreach($newAttributes as $attributeName => $attributeValue)
        {
            $this->assertEquals($attributeValue, $fromDB->$attributeName);
        }

        //cleanup
        SuperCategory::destroy($newAttributes['superCategory_id']);
        Category::destroy($idToUseForInstance);
    }

    /**
     *Test update method returns error message if attributes names are invalid.
     */
    public function test_categoryInternalService_update_method_returns_error_message_if_attributeNames_is_invalid()
    {
        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();

        //id for instance
        $idToUseForInstance = $storeResponse->id;

        //bad attributes - bad title name but good superCategoryId
        $superCategory = SuperCategory::create(['title' => 'someTitle']);
        $superCategoryId = $superCategory->id;
        $newTitle = 'someTitle';

        $newAttributes = [
            'wrong' => $newTitle,
            'superCategory_id' => $superCategoryId,
        ];

        //call update method
        $updateResponse = $this->service->update($idToUseForInstance, $newAttributes);

        //assert error message
        $this->assertEquals('Invalid attributes sent to update method.', $updateResponse);

        //cleanup - superCategory and category
        SuperCategory::destroy($superCategoryId);
        Category::destroy($idToUseForInstance);

    }

    /**
     *Test update method returns error message if superCategory owner doesnt exist.
     */
    public function test_categoryInternalService_update_method_returns_error_message_if_superCategory_owner_doesnt_exist()
    {
        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();
        $idToUseForInstance = $storeResponse->id;

        //new attributes - good title, bad supercategory_id
        $newTitle = 'someTitle';
        $superCategoryId = 'aaa';
        $newAttributes = [
            'title' => $newTitle,
            'superCategory_id' => $superCategoryId,
        ];

        //call update method
        $updateResponse = $this->service->update($idToUseForInstance,$newAttributes);

        //assert error message
        $this->assertEquals('Invalid attributes sent to update method.', $updateResponse);

        //cleanup - category
        Category::destroy($idToUseForInstance);

    }

    /**
     *Test update method returns error message if bad id given.
     */
    public function test_categoryInternalService_update_method_returns_error_message_if_id_does_not_exist()
    {
        //new attributes - good
        $newAttributes = $this->returnGoodAttributes();

        //call update with bad id
        $updateResponse = $this->service->update('aaa', $newAttributes);

        //assert error message
        $this->assertEquals('Model not found.', $updateResponse);

        //cleanup - superCategory
        SuperCategory::destroy($newAttributes['superCategory_id']);
    }


    /***********************************************************************************************************/
    /*                                          Destroy method tests                                              */
    /***********************************************************************************************************/


    /**
     *Test destroy method removes instance from database if id is correct.
     */
    public function test_categoryInternalService_destroy_method_removes_instance_from_database_if_id_is_correct()
    {
        //goodStoreResponse
        $storeResponse = $this->goodStoreResponse();

        //id for instance
        $idToUseForInstance = $storeResponse->id;

        //call destroy method
        $this->service->destroy($idToUseForInstance);

        //attempt to get instance from database
        $fromDB = Category::find($idToUseForInstance);

        //assert null
        $this->assertEquals(null, $fromDB);

    }

    /**
     *Test destroy method returns an error message if bad id used.
     */
    public function test_categoryInternalService_destroy_method_returns_error_message_if_id_does_not_exist()
    {
        //call destroy method on bad id
        $destroyResponseBad = $this->service->destroy('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $destroyResponseBad);
    }



    /***********************************************************************************************************/
    /*                                          Test helper methods                                             */
    /***********************************************************************************************************/

    /**Calls store function for tests to reduce code duplication.
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
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

    /**Returns good attributes for testing to prevent code duplication.
     * @return array
     */
    public function returnGoodAttributes()
    {
        $newSuperCategoryOwner = SuperCategory::create(['title' => 'someTitle']);
        $newTitle = 'newTitle';

        $newAttributes = [
            'title' => $newTitle,
            'superCategory_id' => $newSuperCategoryOwner->id,
        ];

        return $newAttributes;
    }

    /***********************************************************************************************************/
    /*                                          Test helper properties                                            */
    /***********************************************************************************************************/



    public $service;

    public function __construct()
    {
        $this->service = new CategoryInternalService();
    }

}

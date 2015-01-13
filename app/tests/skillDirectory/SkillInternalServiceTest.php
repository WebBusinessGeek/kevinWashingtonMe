<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:47 PM
 */

namespace tests\skillDirectory;


use App\Base\InternalServiceTestAssist;
use App\DomainLogic\SkillDirectory\Skill;
use App\DomainLogic\SkillDirectory\SkillInternalService;
use App\DomainLogic\ToolDirectory\Tool;
use Illuminate\Foundation\Testing\TestCase;

class SkillInternalServiceTest extends InternalServiceTestAssist{


    /***********************************************************************************************************/
    /*                                          Store method tests                                              */
    /***********************************************************************************************************/


    /**
     *Test store method returns an instance of the correct class.
     */
    public function test_store_method_creates_correct_instance_if_attributes_are_correct()
    {
        $storeMethodResponse = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $storeMethodResponse->id;

        $this->assertTrue($this->service->isModelInstance($storeMethodResponse));

        $className = $this->getSubjectModelClassName();

        $className::destroy($subjectModelId);

    }


    /**
     *Test store method stores the instance in the database.
     */
    public function test_store_method_saves_instance_in_database_if_attributes_are_correct()
    {
        $databaseInstanceAfterStoreMethodCalled = $this->returnDatabaseInstanceAfterStoreMethodCalledThenDestroyOwner();

        $this->assertTrue($this->service->isModelInstance($databaseInstanceAfterStoreMethodCalled));

        $subjectModelId = $databaseInstanceAfterStoreMethodCalled->id;

        $className = $this->getSubjectModelClassName();
        $className::destroy($subjectModelId);
    }



    /**
     *Test store method returns error message message if attributes are invalid.
     */
    public function test_store_method_returns_error_message_if_attributes_are_invalid()
    {
        $invalidStoreMethodErrorMessage = $this->returnStoreResponseWithBadAttributeValues();

        $this->assertEquals('Invalid attributes sent to store method.', $invalidStoreMethodErrorMessage);
    }


    /***********************************************************************************************************/
    /*                                          Show method tests                                              */
    /***********************************************************************************************************/

    /**
     *Test show method returns an instance of the correct class.
     */
    public function test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists()
    {
        $showMethodResponse = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithOwner()['show'];

        $this->assertTrue($this->service->isModelInstance($showMethodResponse));

        $subjectModelId = $showMethodResponse->id;
        $className = $this->getSubjectModelClassName();
        $className::destroy($subjectModelId);
    }


    /**
     *Test show method response is the correct instance.
     */
    public function test_show_method_returns_correct_instance_if_subjectModel_id_exists()
    {
        $showResponseGroup = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithOwner();

        $subjectModel = $showResponseGroup['store'];

        $this->assertEquals($subjectModel->title, $showResponseGroup['show']->title);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    /**
     *Test show method returns error message if id is invalid.
     */
    public function test_show_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        //get bad show response
        $showResponseWithInvalidId = $this->returnShowResponseWithBadIdForSubjectModel();

        //assert error message
        $this->assertEquals('Model not found.', $showResponseWithInvalidId);
    }


    public function test_show_method_returns_skills_with_tools()
    {
        $subjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $tools = [];
        foreach(range(1,10) as $index)
        {
            $tool = Tool::create([
                'title' => 'tool'.$index,
            ]);
            $subjectModel->tools()->attach($tool->id);
            array_push($tools, $tool);
        }

        $skillFromDB = Skill::find($subjectModel->id);

        $this->assertTrue(isset($skillFromDB->tools) && $skillFromDB->tools != null);

        $this->cleanUpMultipleModelsAfterTesting($tools);
        $this->cleanUpSingleModelAfterTesting($skillFromDB);
    }


    public function test_show_method_returns_skills_with_correct_amount_of_tools()
    {
        $subjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $tools = [];
        foreach(range(1,10) as $index)
        {
            $tool = Tool::create([
                'title' => 'tool'.$index,
            ]);
            $subjectModel->tools()->attach($tool->id);
            array_push($tools, $tool);
        }

        $skillFromDB = Skill::find($subjectModel->id);

        $this->assertEquals(count($tools), count($skillFromDB->tools));

        $this->cleanUpMultipleModelsAfterTesting($tools);
        $this->cleanUpSingleModelAfterTesting($skillFromDB);

    }
    /***********************************************************************************************************/
    /*                                          Update method tests                                              */
    /***********************************************************************************************************/

    /**
     *Test update method returns instance of correct class.
     */
    public function test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateMethodResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner();

        $this->assertTrue($this->service->isModelInstance($updateMethodResponse['after']));

        $this->cleanUpSingleModelAfterTesting($updateMethodResponse['before']);
    }

    /**
     *Test update method returns changes made to the instance.
     */
    public function test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateResponseGroup = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner();

        $this->assertNotEquals($updateResponseGroup['before']->title, $updateResponseGroup['after']->title);

        $this->cleanUpSingleModelAfterTesting($updateResponseGroup['before']);
    }

    /**
     *Test update method also saves the changes to the database.
     */
    public function test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateResponseGroup = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner();

        $this->assertNotEquals($updateResponseGroup['before']->title, $updateResponseGroup['afterFromDB']->title);

        $this->cleanUpSingleModelAfterTesting($updateResponseGroup['before']);
    }

    /**
     *Test update method returns an error message if incorrect attributes are given.
     */
    public function test_update_method_returns_error_message_if_attributes_are_invalid()
    {
        $updateResponseGroupUsingInvalidAttributes = $this->returnUpdateResponseGroupWithBadAttributeValuesForSubjectModelWithOwner();

        $this->assertEquals('Invalid attributes sent to update method.', $updateResponseGroupUsingInvalidAttributes['call']);

        $this->cleanUpSingleModelAfterTesting($updateResponseGroupUsingInvalidAttributes['before']);
    }


    /**
     *Test update method returns an error message if invalid id is given.
     */
    public function test_update_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $updateResponseGroupUsingInvalidId = $this->returnUpdateResponseGroupWithBadIdForSubjectModelWithOwner();

        $this->assertEquals('Model not found.', $updateResponseGroupUsingInvalidId['call']);

        $this->cleanUpSingleModelAfterTesting($updateResponseGroupUsingInvalidId['before']);
    }


    /***********************************************************************************************************/
    /*                                          Update method tests                                              */
    /***********************************************************************************************************/

    /**
     *Test destroy method removes the instance from the database.
     */
    public function test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct()
    {
        $destroyResponseGroup = $this->returnDestroyResponseGroupForSubjectModelWithOwner();

        $this->assertEquals(null, $destroyResponseGroup['afterFromDB']);
    }

    /**
     *Test destroy method returns an error message if bad id is used.
     */
    public function test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $destroyResponseGroup = $this->returnDestroyResponseGroupWithBadIdForSubjectModelWithOwner();

        $this->assertEquals('Model not found.', $destroyResponseGroup['call']);

        $this->cleanUpSingleModelAfterTesting($destroyResponseGroup['before']);
    }


    /***********************************************************************************************************/
    /*                                                  Index Method Tests                                       */
    /***********************************************************************************************************/
    /**
     *Test index method returns instances of the correct class.
     */
    public function test_index_method_returns_correct_class_instances()
    {
        $indexResponseGroup = $this->returnIndexResponseGroupForSubjectModelWithOwner(6);

        $instanceToTest = $indexResponseGroup['call'][0];

        $this->assertTrue($this->service->isModelInstance($instanceToTest));

        $this->cleanUpMultipleModelsAfterTesting($indexResponseGroup['subjectModels']);
    }


    /**
     *Test index method returns correct pagination count.
     */
    public function test_index_method_returns_correct_quantity_of_pagination()
    {
        $paginationCount = 6;

        $indexResponseGroup = $this->returnIndexResponseGroupForSubjectModelWithOwner($paginationCount);

        $this->assertEquals($paginationCount, count($indexResponseGroup['call']));

        $this->cleanUpMultipleModelsAfterTesting($indexResponseGroup['subjectModels']);
    }

    /***********************************************************************************************************/
    /*                                          Test  properties                                               */
    /***********************************************************************************************************/

    public $service;

    public function __construct()
    {
        $this->service = new SkillInternalService();
    }


}


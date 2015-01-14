<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 8:17 PM
 */

namespace tests\experienceDirectory;


use App\Base\InternalServiceTestAssist;
use App\DomainLogic\ExperienceDirectory\Experience;
use App\DomainLogic\ExperienceDirectory\ExperienceInternalService;
use App\DomainLogic\ImageDirectory\Image;

class ExperienceInternalServiceTest extends InternalServiceTestAssist {


    /***********************************************************************************************************/
    /*                                                  Store TestCases                                       */
    /***********************************************************************************************************/

    /**
     *Test store method creates correct instances.
     */
    public function test_store_method_creates_correct_instance_if_attributes_are_correct()
    {
        $storeResponse = $this->returnStoreResponseWithGoodAttributes();

        $this->assertTrue($this->service->isModelInstance($storeResponse));

        $this->cleanUpSingleModelAfterTesting($storeResponse);

    }

    /**
     *Test store method stores correct instance in database.
     */
    public function test_store_method_saves_instance_in_database_if_attributes_are_correct()
    {
        $databaseInstanceAfterStoreMethodCalled = $this->returnDatabaseInstanceAfterStoreMethodCalled();

        $this->assertTrue($this->service->isModelInstance($databaseInstanceAfterStoreMethodCalled));

        $this->cleanUpSingleModelAfterTesting($databaseInstanceAfterStoreMethodCalled);
    }


    /**
     *Test store method returns error message if attributes are invalid.
     */
    public function test_store_method_returns_error_message_if_attributes_are_invalid()
    {
        $storeMethodCallWithBadAttributes = $this->returnStoreResponseWithBadAttributeValues();

        $this->assertEquals('Invalid attributes sent to store method.', $storeMethodCallWithBadAttributes);
    }


    /***********************************************************************************************************/
    /*                                                  Show TestCases                                       */
    /***********************************************************************************************************/

    /**
     *Test show method returns instance of correct class.
     */
    public function test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists()
    {
        $subjectModelFromShowMethod = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithoutOwner()['show'];

        $this->assertTrue($this->service->isModelInstance($subjectModelFromShowMethod));

        $this->cleanUpSingleModelAfterTesting($subjectModelFromShowMethod);
    }


    /**
     *Test show method returns correct instance.
     */
    public function test_show_method_returns_correct_instance_if_subjectModel_id_exists()
    {
        $storeAndShowResponse = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithoutOwner();

        $subjectModelFromStoreMethod = $storeAndShowResponse['store'];
        $subjectModelFromShowMethod = $storeAndShowResponse['show'];

        $this->assertEquals($subjectModelFromStoreMethod, $subjectModelFromShowMethod);

        $this->cleanUpSingleModelAfterTesting($subjectModelFromShowMethod);
    }

    /**
     *Test show method returns error message if wrong id is used.
     */
    public function test_show_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $shouldBeErrorMessage = $this->returnShowResponseWithBadIdForSubjectModel();

        $this->assertEquals('Model not found.', $shouldBeErrorMessage);
    }


    /***********************************************************************************************************/
    /*                                                  Update TestCases                                       */
    /***********************************************************************************************************/


    /**
     *Test update method returns instance of correct class.
     */
    public function test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $updatedSubjectModel = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner()['after'];

        $this->assertTrue($this->service->isModelInstance($updatedSubjectModel));

        $this->cleanUpSingleModelAfterTesting($updatedSubjectModel);
    }

    /**
     *Test update method returns an updated instance of subject model.
     */
    public function test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $storeAndUpdateResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner();

        $originalSubjectModel = $storeAndUpdateResponse['before'];

        $updatedSubjectModel = $storeAndUpdateResponse['after'];

        $this->assertNotEquals($originalSubjectModel->name, $updatedSubjectModel->name);

        $this->cleanUpSingleModelAfterTesting($updatedSubjectModel);
    }

    /**
     *Test update method saves new changes to database.
     */
    public function test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct()
    {
        $storeAndUpdateResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner();

        $originalSubjectModel = $storeAndUpdateResponse['before'];

        $updatedSubjectModelFromDB = $storeAndUpdateResponse['afterFromDB'];

        $this->assertNotEquals($originalSubjectModel->name, $updatedSubjectModelFromDB->name);

        $this->cleanUpSingleModelAfterTesting($updatedSubjectModelFromDB);
    }


    /**
     *Test update method returns error message if attributes are invalid.
     */
    public function test_update_method_returns_error_message_if_attributes_are_invalid()
    {
        $storeAndBadUpdateCall = $this->returnUpdateResponseGroupWithBadAttributeValuesForSubjectModelWithoutOwner();

        $originalSubjectModel = $storeAndBadUpdateCall['before'];

        $shouldBeErrorMessage = $storeAndBadUpdateCall['call'];

        $this->assertEquals('Invalid attributes sent to update method.', $shouldBeErrorMessage);

        $this->cleanUpSingleModelAfterTesting($originalSubjectModel);
    }

    /**
     *Test update method returns error messageif bad id used to get subjectModel.
     */
    public function test_update_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $storeAndBadUpdateCall = $this->returnUpdateResponseGroupWithBadIdForSubjectModelWithoutOwner();

        $originalSubjectModel = $storeAndBadUpdateCall['before'];

        $shouldBeErrorMessage = $storeAndBadUpdateCall['call'];

        $this->assertEquals('Model not found.', $shouldBeErrorMessage);

        $this->cleanUpSingleModelAfterTesting($originalSubjectModel);
    }

    /***********************************************************************************************************/
    /*                                                  Destroy TestCases                                       */
    /***********************************************************************************************************/


    /**
     *Test destroy method removes instance from database.
     */
    public function test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct()
    {
        $storeAndDestroyCall = $this->returnDestroyResponseGroupForSubjectModelWithoutOwner();

        $subjectModelFromDBAfterDelete = $storeAndDestroyCall['afterFromDB'];

        $this->assertEquals(null, $subjectModelFromDBAfterDelete);
    }

    /**
     *Test destroy method returns error message if id is bad.
     */
    public function test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $storeAndBadDestroyCall = $this->returnDestroyResponseGroupWithBadIdForSubjectModelWithoutOwner();

        $originalSubjectModel = $storeAndBadDestroyCall['before'];

        $shouldBeErrorMessage = $storeAndBadDestroyCall['call'];

        $this->assertEquals('Model not found.', $shouldBeErrorMessage);

        $this->cleanUpSingleModelAfterTesting($originalSubjectModel);
    }

    /***********************************************************************************************************/
    /*                                                  Index TestCases                                       */
    /***********************************************************************************************************/


    /**
     *Test index method returns instance of correct class.
     */
    public function test_index_method_returns_correct_class_instances()
    {
        $paginationCount = 6;

        $indexMethodCallResponseGroup = $this->returnIndexResponseGroupForSubjectModelWithoutOwner($paginationCount);

        $paginationResponse = $indexMethodCallResponseGroup['call'];

        $this->assertTrue($this->service->isModelInstance($paginationResponse[0]));

        $mockSubjectModels = $indexMethodCallResponseGroup['subjectModels'];

        $this->cleanUpMultipleModelsAfterTesting($mockSubjectModels);
    }

    /**
     *Test index method returns correct quantity on pagination results
     */
    public function test_index_method_returns_correct_quantity_of_pagination()
    {
        $paginationCount = 6;

        $indexMethodResponseGroup = $this->returnIndexResponseGroupForSubjectModelWithoutOwner($paginationCount);

        $paginationResponse = $indexMethodResponseGroup['call'];

        $this->assertEquals($paginationCount, count($paginationResponse));

        $mockSubjectModels = $indexMethodResponseGroup['subjectModels'];

        $this->cleanUpMultipleModelsAfterTesting($mockSubjectModels);

    }



    /***********************************************************************************************************/
    /*                                                  Relationship rel test cases                             */
    /***********************************************************************************************************/


    /**
     *Test update method attaches image to experience.
     */
    public function test_update_method_attaches_image_to_experience_model()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $image = Image::create([
            'name' => 'testUpdateMethodAttachesImageToExperienceModel',
            'originalPath' => 'somePath/here',
        ]);
        $attributesToPassToUpdateMethod = [
            'image_id' => $image->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $attributesToPassToUpdateMethod);


        $updatedSubjectModel = Experience::find($subjectModelId);
        $amountOfImagesExperienceModelShouldHave = 1;
        $this->assertEquals($amountOfImagesExperienceModelShouldHave, count($updatedSubjectModel->images));


        $modelsToClean = [$originalSubjectModel, $image];
        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');
    }


    public function test_no_more_than_one_image_can_be_added_to_experience_model()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $firstImage = Image::create([
            'name' => 'testNoMoreThanOneImageCanBeAddedToExperienceModel',
            'originalPath' => 'somePath/here',
        ]);
        $attributesToPassToUpdateMethod = [
            'image_id' => $firstImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $attributesToPassToUpdateMethod);



        $newImage = Image::create([
            'name' => 'testNoMoreThanOneImageCanBeAddedToExperienceModel2',
            'originalPath' => 'someOtherPath/here',
        ]);
        $newAttributesToPassToUpdateMethod = [
            'image_id' => $newImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $newAttributesToPassToUpdateMethod);



        $updatedSubjectModel = Experience::find($subjectModelId);
        $amountOfImagesExperienceModelShouldHave = 1;
        $this->assertEquals($amountOfImagesExperienceModelShouldHave, count($updatedSubjectModel->images));


        $modelsToClean = [$originalSubjectModel, $firstImage, $newImage];
        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');
    }

    public function test_correct_image_is_synced_when_experience_model_has_been_previously_linked_to_multiple_images()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $firstImage = Image::create([
            'name' => 'testNoMoreThanOneImageCanBeAddedToExperienceModel',
            'originalPath' => 'somePath/here',
        ]);
        $attributesToPassToUpdateMethod = [
            'image_id' => $firstImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $attributesToPassToUpdateMethod);



        $newImage = Image::create([
            'name' => 'testNoMoreThanOneImageCanBeAddedToExperienceModel2',
            'originalPath' => 'someOtherPath/here',
        ]);
        $newAttributesToPassToUpdateMethod = [
            'image_id' => $newImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $newAttributesToPassToUpdateMethod);



        $updatedSubjectModel = Experience::find($subjectModelId);
        $idOfImageAttachedToExperienceModel = $newImage->id;
        $this->assertEquals($idOfImageAttachedToExperienceModel, $updatedSubjectModel->images[0]->id);



        $modelsToClean = [$originalSubjectModel, $firstImage, $newImage];
        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');
    }






    /***********************************************************************************************************/
    /*                                                  Test Properties                                      */
    /***********************************************************************************************************/


    public function __construct()
    {
        $this->service = new ExperienceInternalService();
    }
}

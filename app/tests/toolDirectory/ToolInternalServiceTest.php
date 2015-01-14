<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 1:58 PM
 */

namespace tests\toolDirectory;


use App\Base\InternalServiceTestAssist;
use App\Base\InternalServiceTestLibrary;
use App\DomainLogic\ImageDirectory\Image;
use App\DomainLogic\ToolDirectory\Tool;
use App\DomainLogic\ToolDirectory\ToolInternalService;
use Illuminate\Foundation\Testing\TestCase;

class ToolInternalServiceTest extends InternalServiceTestLibrary{

    /**
     *Test method creates and returns a new tool instance if attributes are correct.
     *Otherwise should return an error message.
     */
    public function test_toolInternalService_store_method()
    {
        //service instance
        $toolService = new ToolInternalService();

        //good attributes to add to new model
        $good = [
            'title' => 'toolInternalServiceStoreMethodTest',
        ];

        //call store on good attributes
        $storeResponse = $toolService->store($good);

        //assert

            // instance of model was returned
            $this->assertTrue($toolService->isModelInstance($storeResponse));

            // attribute values are as expected
            $this->assertEquals($good['title'], $storeResponse->title);

        //bad attributes to invoke error message
        $bad = [
            'wrong' => 'someTitle',
        ];

        //call store on bad attributes
        $storeResponseBad = $toolService->store($bad);

        //assert error message
        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseBad);

        //cleanup
        Tool::destroy($storeResponse->id);
    }

    /**
     *Test method retrieves specified instance from database table if it exists.
     * Otherwise should return error message.
     */
    public function test_toolInternalService_show_method()
    {
        //service instance
        $toolService = new ToolInternalService();

        //create new tool instance
        $good = [
            'title' => 'toolInternalServiceShowMethodTest',
        ];

        $storeResponse = $toolService->store($good);

        //prove its in database
        $proofTestInstanceIsInDatabase = Tool::find($storeResponse->id);
        $this->assertEquals($good['title'], $proofTestInstanceIsInDatabase->title);

        //call show method using new instances id
        $showResponse = $toolService->show($proofTestInstanceIsInDatabase->id);

        //assert

            //instance of model returned
            $this->assertTrue($toolService->isModelInstance($showResponse));

            //attributes are as expected
            $this->assertEquals($good['title'], $showResponse->title);

        //call show method on bad id to invoke error message
        $bad = [
            'wrong' => 'someTitle',
        ];

        $showResponseBad = $toolService->show('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $showResponseBad);

        //cleanup
        Tool::destroy($proofTestInstanceIsInDatabase->id);
    }

    /**
     *Test method updates a tool model instance if it exists and attributes are valid. Otherwise returns an error message
     */
    public function test_toolInternalService_update_method()
    {
        //service instance
        $toolService = new ToolInternalService();

        //create and store a new tool instance
        $attributes = [
            'title' => 'toolInternalServiceUpdateMethodTest1',

        ];

        $storeResponseForId = $toolService->store($attributes);

        //assert
            //its indeed in database
            $proofItsInDatabase = Tool::find($storeResponseForId->id);

            //attributes are expected
            $this->assertEquals($attributes['title'], $proofItsInDatabase->title);

        //call update method on instance
        $newAttributes= [
            'title' => 'toolInternalServiceUpdateMethodTest2'
        ];

        $updateResponse = $toolService->update($storeResponseForId->id,$newAttributes);

        //assert changes were made to database instance
        $proofInstanceWasUpdateInDB = Tool::find($storeResponseForId->id);
        $this->assertEquals($newAttributes['title'], $proofInstanceWasUpdateInDB->title);

        //call update with bad attributes
        $badAttributes = [
            'wrong' => 'someTitle',
        ];
        $updateResponseBad = $toolService->update($storeResponseForId->id, $badAttributes);

        //call update with bad id
        $updateResponseBad2 = $toolService->update('aaa', $newAttributes);

        //assert error messages returned
        $this->assertEquals('Invalid attributes sent to update method.', $updateResponseBad);
        $this->assertEquals('Model not found.', $updateResponseBad2);

        //clean up
        Tool::destroy($storeResponseForId->id);
    }

    /**
     *Test method removes a tool model instance from database if it exists. Otherwise returns an error message.
     */
    public function test_toolInternalService_destroy_method()
    {
        //service instance
        $toolService = new ToolInternalService();

        //create and store a new tool instance
        $attributes = [
            'title' => 'toolInternalServiceDestroyMethodTest',
        ];

        $storeResponse = $toolService->store($attributes);
        $idToUseForInstance = $storeResponse->id;

        //assert its indeed in the database
        $proofInstanceIsInDB = Tool::find($idToUseForInstance);
        $this->assertEquals($attributes['title'], $proofInstanceIsInDB->title);
        $this->assertTrue($toolService->isModelInstance($proofInstanceIsInDB));

        //call destroy method on tool instances
        $destroyResponse = $toolService->destroy($idToUseForInstance);

        //assert its no longer in the database
        $proofInstanceIsNOTInDB = Tool::find($idToUseForInstance);
        $this->assertEquals(null, $proofInstanceIsNOTInDB);

        //call destroy method on bad id
        $destroyResponseBad = $toolService->destroy('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $destroyResponseBad);

    }

    /**
     *Test method returns an instance of paginator class with correct amount of items.
     */
    public function test_toolInternalService_index_method()
    {
        //service instance
        $toolService = new ToolInternalService();

        //pagination count parameter
        $paginationCount = 6;

        //pagination class container
        $paginationClass = 'Illuminate\Pagination\Paginator';

        //fake tools data
        $tools = [];
        foreach(range(1, 20) as $index)
        {
            array_push($tools, Tool::create([
                'title' => 'toolNumber'.$index,
            ]));
        }
        //call index method
        $indexResponse = $toolService->index($paginationCount);

        //assert response is instance of paginator class
        $this->assertEquals(get_class($indexResponse), $paginationClass);

        //assert amount of items returned matches pagination count
        $this->assertEquals(count($indexResponse), $paginationCount);

        //clean up
        foreach($tools as $tool)
        {
            Tool::destroy($tool->id);
        }
    }


    /***********************************************************************************************************/
    /*                                          Relationship rel test cases                                      */
    /***********************************************************************************************************/


    /**
     *Test update method will attach an image to the tool model.
     */
    public function test_update_method_will_attach_image()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $image = Image::create([
            'name' => 'testUpdateMethodWillAttachImage',
            'originalPath' => 'somePath/here',
        ]);
        $newAttributes = [
            'image_id' => $image->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $newAttributes);


        $updatedSubjectModel = Tool::find($subjectModelId);
        $amountOfImagesToolShouldHave = 1;
        $this->assertEquals($amountOfImagesToolShouldHave, count($updatedSubjectModel->images));

        $modelsToClean = [
            $originalSubjectModel, $image
        ];

        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');

    }

    public function test_tool_can_have_no_more_than_one_image()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $firstImage = Image::create([
            'name' => 'testToolCanHaveNoMoreThanOneImage',
            'originalPath' => 'somePath/here',
        ]);
        $attributesToPassToUpdateMethod = [
            'image_id' => $firstImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $attributesToPassToUpdateMethod);



        $newImage = Image::create([
            'name' => 'testToolCanHaveNoMoreThanOneImage2',
            'originalpath' => 'someOtherPath/here',
        ]);
        $newAttributesToPassToUpdateMethod = [
            'image_id' => $newImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $newAttributesToPassToUpdateMethod);



        $updatedSubjectModel = Tool::find($subjectModelId);
        $amountOfImagesToolShouldHave = 1;
        $this->assertEquals($amountOfImagesToolShouldHave, count($updatedSubjectModel->images));


        $modelsToClean = [$originalSubjectModel, $firstImage, $newImage];
        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');
    }

    public function test_correct_image_is_synced_to_tool_model()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributes();
        $subjectModelId = $originalSubjectModel->id;


        $firstImage = Image::create([
            'name' => 'testToolCanHaveNoMoreThanOneImage',
            'originalPath' => 'somePath/here',
        ]);
        $attributesToPassToUpdateMethod = [
            'image_id' => $firstImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $attributesToPassToUpdateMethod);



        $newImage = Image::create([
            'name' => 'testToolCanHaveNoMoreThanOneImage2',
            'originalPath' => 'someOtherPath/here',
        ]);
        $newAttributesToPassToUpdateMethod = [
            'image_id' => $newImage->id,
        ];
        $this->callServiceUpdateMethod($subjectModelId, $newAttributesToPassToUpdateMethod);



        $updatedSubjectModel = Tool::find($subjectModelId);
        $idOfImageThatShouldBeAttachedToTool = $newImage->id;
        $this->assertEquals($idOfImageThatShouldBeAttachedToTool, $updatedSubjectModel->images[0]->id);


        $modelsToClean = [$originalSubjectModel, $firstImage, $newImage];
        $this->cleanUpMultipleModelsAfterTesting($modelsToClean);
        $this->cleanDatabaseTable('imageables');
    }


    /***********************************************************************************************************/
    /*                                          Test Properties                                             */
    /***********************************************************************************************************/


    public function __construct()
    {
        $this->service = new ToolInternalService();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 1:58 PM
 */

namespace tests\toolDirectory;


use App\DomainLogic\ToolDirectory\Tool;
use App\DomainLogic\ToolDirectory\ToolInternalService;
use Illuminate\Foundation\Testing\TestCase;

class ToolInternalServiceTest extends \TestCase{

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
     *
     */
    public function test_toolInternalService_update_method()
    {
        //service instance

        //create and store a new tool instance

        //assert

            //its indeed in database
            //attributes are expected

        //call update method on instance

        //assert changes were made to database instance

        //call update with bad attributes

        //assert error messages returned

        //clean up
    }

    /**
     *
     */
    public function test_toolInternalService_destroy_method()
    {

    }

    /**
     *
     */
    public function test_toolInternalService_index_method()
    {

    }
}

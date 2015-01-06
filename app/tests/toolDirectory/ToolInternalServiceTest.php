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
            'title' => 'toolInternalServiceShowMethodTest',
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
     *
     */
    public function test_toolInternalService_show_method()
    {

    }

    /**
     *
     */
    public function test_toolInternalService_update_method()
    {

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

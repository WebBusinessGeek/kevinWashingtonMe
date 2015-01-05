<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/4/15
 * Time: 4:11 PM
 */

namespace tests\tagDirectory;


use App\DomainLogic\TagDirectory\Tag;
use App\DomainLogic\TagDirectory\TagInternalService;
use Illuminate\Foundation\Testing\TestCase;

class TagInternalServiceTest extends \TestCase{

    /**
     *Test method returns a new resource instance from database if attributes are correct.
     * Otherwise should return an error message.
     */
    public function test_tagInternalService_store_method()
    {
        //service instance
        $tagService = new TagInternalService();

        //good attributes
        $good = [
            'title' => 'tagInternalServiceStoreMethodTest',

        ];

        //call store method on good attributes and assert new record is indeed in database
        $storeMethodCallResponse = $tagService->store($good);
        $this->assertTrue($tagService->isModelInstance($storeMethodCallResponse));
        $this->assertEquals($good['title'], $storeMethodCallResponse->title);

        //bad attributes
        $bad = [
            'wrong' => 'tagInternalServiceStoreMethodTest2',
        ];

        //call store method on bad attributes and assert error message
        $storeMethodCallResponseBad = $tagService->store($bad);
        $this->assertEquals('Invalid attributes sent to method.', $storeMethodCallResponseBad);

        //delete all resources
        Tag::destroy($storeMethodCallResponse->id);
    }


    /**
     *Test method returns specified tag instance if it exists, otherwise returns an error message. 
     */
    public function test_tagInternalService_show_method()
    {
        //service instance
        $tagService = new TagInternalService();

        //create and store new tag instance
        $good = [
            'title' => 'tagInternalServiceShowMethodTest1',
        ];

        $storeResponse = $tagService->store($good);

        //assert its in database
        $fromDB = Tag::find($storeResponse->id);
        $this->assertEquals($good['title'], $fromDB->title);

        //call show method and assert the attributes
        $showResponse = $tagService->show($storeResponse->id);
        $this->assertEquals($fromDB->title, $showResponse->title);

        //call show method on bad id and assert error message
        $showResponseBad = $tagService->show('aaa');
        $this->assertEquals('Model not found.', $showResponseBad);
        //delete testing resources
        Tag::destroy($showResponse->id);
    }


    /**
     *Test method destroys specified instance if it exists, otherwise returns an error message.
     */
    public function test_tagInternalService_destroy_method()
    {
        //service instance

        //create and store new instance

        //assert its indeed in database

        //call destroy method on instance

        //assert its no longer in database

        //call destroy method on bad id

        //assert error message
    }


}

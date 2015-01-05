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
        $tagService = new TagInternalService();

        //create and store new instance
        $good = [
            'title' => 'tagInternalServiceDestroyMethodTest',

        ];

        $storeResponse = $tagService->store($good);

        //assert its indeed in database
        $showResponse = $tagService->show($storeResponse->id);
        $this->assertEquals($good['title'], $showResponse->title);

        //call destroy method on instance
        $destroyResponse = $tagService->destroy($showResponse->id);

        //assert its no longer in database
        $ensureNotInDB = Tag::find($showResponse->id);
        $this->assertEquals(null, $ensureNotInDB);

        //call destroy method on bad id
        $destroyResponseBad = $tagService->destroy('aaa');

        //assert error message
        $this->assertEquals('Model not found.', $destroyResponseBad);
    }


    /**
     *Test method returns an updated model instance if attributes passed are valid.
     * Otherwise should throw error message
     */
    public function test_tagInternalService_update_method()
    {
        //service instance
        $tagService = new TagInternalService();

        //create and store a new tag instance
        $attr = [
            'title' => 'tagInternalServiceUpdateMethodTest',
        ];

        $storeResponse = $tagService->store($attr);

        //assert its in database and attributes are as expected
        $fromDB = $tagService->show($storeResponse->id);
        $this->assertEquals($attr['title'], $fromDB->title);

        //call update method on the instance
        $newAttr = [
            'title' => 'tagInternalServiceUpdateMethodTestUpdated'
        ];

        $updateResponse = $tagService->update($storeResponse->id, $newAttr);

        //assert that changes were made
        $updatedFromDB = $tagService->show($storeResponse->id);
        $this->assertEquals($newAttr['title'], $updatedFromDB->title);

        //call update with bad attributes
        $badAttr = [
            'wrong' => 'someValue'
        ];

        //call update with bad id
        $updateResponseBad1 = $tagService->update($storeResponse->id, $badAttr);
        $updateResponseBad2 = $tagService->update('aaa', $attr);

        //assert error messages
        $this->assertEquals('Invalid attributes given.', $updateResponseBad1);
        $this->assertEquals('Model not found.', $updateResponseBad2);

        //clean up testing resources
        Tag::destroy($storeResponse->id);
    }


}

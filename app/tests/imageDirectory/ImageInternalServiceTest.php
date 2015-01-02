<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 1:05 PM
 */

namespace tests\imageDirectory;


use App\DomainLogic\ImageDirectory\Image;
use App\DomainLogic\ImageDirectory\ImageInternalService;
use App\Polymorphic\TraitConcrete;
use Illuminate\Foundation\Testing\TestCase;

class ImageInternalServiceTest extends \TestCase {

    /**
     *Test method stores a new image resource
     */
    public function test_imageInternalService_store_method()
    {
        //service instance
        $imageService = new ImageInternalService();

        //good attributes
        $good1 = [
            'name' => 'imageInternalService@storeMethodTest',
            'image' => $imageService->createMockUploadedImage('png', 'imageInternalServiceStoreMethodTest', 'uploads/testing'),
        ];

        //bad attributes
        $bad1 = [
            'name' => 'imageInternalService@storeMethodTest2',
            'image' => $imageService->createMockUploadedTextFile('someTextFile', 'uploads/testing')
        ];

        //call store method on good attributes and assert the returned Image model attributes
        $goodResponse = $imageService->store($good1);
        $this->assertTrue($imageService->isModelInstance($goodResponse));

        //call store method on bad attributes and assert error message
        $badResponse = $imageService->store($bad1);
        $this->assertEquals('Not a valid image', $badResponse);

        //delete the image files created from testing.
        unlink($goodResponse->originalLongPath);
        unlink($goodResponse->smallLongPath);
        unlink($goodResponse->mediumLongPath);
        unlink($goodResponse->largeLongPath);

        unlink($bad1['image']->getPathName());

        //delete the image resources from database
        Image::destroy($goodResponse->id);
    }


    /**
     *Test method returns specified instance from database, otherwise error message.
     */
    public function test_imageInternalService_show_method()
    {
        //service instance
        $imageService = new ImageInternalService();

        //store real image resource instance in database
        $goodAttr = [
            'name' => 'imageInternalService@showMethodTest',
            'image' => $imageService->createMockUploadedImage('png', 'someImage', 'uploads/testing')
        ];

        $storedImage = $imageService->store($goodAttr);

        //assert its in database
        $fromDB = Image::find($storedImage->id);
        $this->assertEquals($goodAttr['name'], $fromDB->getName());

        //call show method and assert its the same resource
        $fromDBWithShowMethod = $imageService->show($storedImage->id);
        $this->assertEquals($fromDB, $fromDBWithShowMethod);

        //destroy image resource
        Image::destroy($fromDBWithShowMethod->id);
        unlink($fromDBWithShowMethod->originalLongPath);
        unlink($fromDBWithShowMethod->smallLongPath);
        unlink($fromDBWithShowMethod->mediumLongPath);
        unlink($fromDBWithShowMethod->largeLongPath);

        //call show method on bad id and assert error message
        $badResponse = $imageService->show('aaa');
        $this->assertEquals('Model not found.', $badResponse);
    }

    /**
     *Test method removes model instance from database if it exists, otherwise should throw error message.
     */
    public function test_imageInternalService_destroy_method()
    {
        //service instance
        $imageService = new ImageInternalService();

        //create and store new image instance
        $good = [
            'name' => 'imageInternalService@destroyMethodTest',
            'image' => $imageService->createMockUploadedImage('png', 'someFileName', 'uploads/testing')
        ];

        $stored = $imageService->store($good);

        //assert its indeed in database
        $fromDB = Image::find($stored->id);
        $this->assertEquals($stored->originalPath, $fromDB->originalPath);

        //call destroy method on instance
        $imageService->destroy($fromDB->id);

            //assert its no longer in database
            $nonExistenceCheck = $imageService->show($stored->id);
            $this->assertEquals('Model not found.', $nonExistenceCheck);

            //assert images are no longer stored
            foreach($imageService->getModelDestroyableAttributes() as $attr)
            {
                $this->assertFalse(file_exists($fromDB->$attr));
            }

        //call destroy method on bad id and assert error message
        $this->assertEquals('Model not found.', $imageService->destroy('aaa'));

    }


    /**
     *Test method updates an image resource w
     */
    public function test_imageInternalService_update_method()
    {

    }
}

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
}

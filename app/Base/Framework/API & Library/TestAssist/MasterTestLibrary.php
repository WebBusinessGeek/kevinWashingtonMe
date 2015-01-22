<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 4:23 PM
 */

namespace App\Base;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\DB;

class MasterTestLibrary extends \TestCase {


    public $imageTestingDirectories =[

        'uploads/large',
        'uploads/medium',
        'uploads/original',
        'uploads/small',
        'uploads/testing'
    ];


    /***********************************************************************************************************/
    /*                                        *** Helper methods for Descendants ***                            */
    /***********************************************************************************************************/




    public function cleanUpSingleModelAfterTesting(Model $model)
    {
        $subjectModelId =  $model->id;
        $className = $model->getClassName();
        $className::destroy($subjectModelId);
    }

    public function cleanUpMultipleModelsAfterTesting($models = array())
    {
        foreach($models as $model)
        {
            $this->cleanUpSingleModelAfterTesting($model);
        }
    }

    public function cleanDatabaseTable($tableName)
    {
        DB::table($tableName)->truncate();
    }


    public function clean_files_from_all_directories($paths)
    {
        foreach($paths as $path)
        {
            $this->clean_files_from_directory(public_path().'/'.$path);
        }
    }


    public function clean_files_from_directory($path)
    {
        $files = glob($path.'/*');

        foreach($files as $file)
        {
            if(is_file($file))
                unlink($file);
        }
    }


    public function GETRoute($route, $parameters = null)
    {
        return (isset($parameters))? $this->call('GET', $route, $parameters): $this->call('GET', $route);
    }



    /**************************************             Fakers           ***********************************************/


    public function generateRandomIntegers()
    {
        return md5(rand(1209382, 102938102938109238));
    }

    public function fakeGoodEmailAttribute()
    {
        return 'FakeGoodEmailAttribute'.$this->generateRandomIntegers().'@myFramework.com';
    }

    public function fakeGoodUrlAttribute()
    {
        return 'http://www.fakeURLFromMyFramework'.$this->generateRandomIntegers().'.com';
    }

    public function fakeGoodPasswordAttribute()
    {
        return 'testtest'.$this->generateRandomIntegers().'FromMyFramework';
    }

    public function fakeGoodStringAttribute()
    {
        return 'FakeGoodString'.$this->generateRandomIntegers().'FromMyFrameWork';
    }

    public function fakeGoodExistsAttribute()
    {
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();

        return $ownerClassName::create([''])->id;
    }

    public function fakeGoodTextAttribute()
    {
        $text = 'FakeGoodText'.$this->generateRandomIntegers().'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>';
        return $text;
    }

    public function fakeGoodPhoneNumberAttribute()
    {
        return '215-334-5454';
    }

    public function fakeGoodImageAttribute($extension = 'png')
    {
        $filename = $this->generateRandomIntegers();
        $storageDirectory = public_path(). '/'. 'uploads/testing'.'/';
        $extensionMethod = 'image'.$extension;

        $image =imagecreate(300, 300);
        imagecolorallocate($image, 0, 0, 255 );
        $extensionMethod($image, public_path().'/'. $filename . '.' . $extension);
        rename(public_path().'/'. $filename . '.' . $extension, $storageDirectory . $filename . '.' . $extension);

        $file = new \Symfony\Component\HttpFoundation\File\UploadedFile(
            $storageDirectory . $filename . '.' . $extension,
            $filename . '.' . $extension,
            'image/'. $extension,
            filesize($storageDirectory . $filename . '.' . $extension)
        );


        return $file;
    }

    public function fakeGoodPathAttribute()
    {
        return 'somePath/here';
    }

    public function fakeBadEmailAttribute()
    {
        return 'FakeBadEmailAttribute';
    }

    public function fakeBadUrlAttribute()
    {
        return 'fakeURLFromMyFramework.com';
    }

    public function fakeBadPasswordAttribute()
    {
        return 'fakeBad';
    }

    public function fakeBadStringAttribute()
    {
        return 1;
    }

    public function fakeBadExistsAttribute()
    {
        return 'aaa';
    }

    public function fakeBadTextAttribute()
    {
        return '';
    }

    public function fakeBadPhoneNumberAttribute()
    {
        return '215-555933';
    }

    public function fakeBadImageAttribute($extension = 'png')
    {
        return '';
    }

    public function fakeBadPathAttribute()
    {
        return '';
    }







}
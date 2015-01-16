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





}
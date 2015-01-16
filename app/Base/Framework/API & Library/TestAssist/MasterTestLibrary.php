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





}
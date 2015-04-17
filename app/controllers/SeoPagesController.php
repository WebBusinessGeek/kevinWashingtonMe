<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 4/17/15
 * Time: 4:22 PM
 */

class SeoPagesController extends BaseController {

    public $layout = 'seoPages.wrapper';


    public function viewMain()
    {
        $view = View::make('seoPages.main');
        return $view;
    }

    public function viewAddValue1()
    {
        $view = View::make('seoPages.addValue1');
        $this->layout->content = $view->render();
    }

    public function viewAddValue2()
    {

    }

    public function viewAddValue3()
    {

    }

    public function viewDemo()
    {

    }

    public function viewConnect()
    {

    }

    public function viewCTA()
    {

    }

    public function viewCTATO()
    {

    }

    public function viewConversionConfirm()
    {

    }

}
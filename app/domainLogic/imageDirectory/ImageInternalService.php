<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:23 AM
 */

namespace App\DomainLogic\ImageDirectory;


class ImageInternalService {

    public function store($attributes = array())
    {
        //get image file - not done

        //determine if uploaded file was image - DONE

        //validate that its in png format - DONE

        //create four sizes (small, medium, and large, original) - not done

        //create image object
            //attach the paths (small, medium, large, original) to image object - not done
            //name the image object - not done
            //store the image in the database - not done

        //return the image object?
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function index()
    {

    }
}
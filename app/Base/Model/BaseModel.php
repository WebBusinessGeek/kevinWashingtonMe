<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/31/14
 * Time: 4:44 PM
 */

namespace App\Base;


class BaseModel {




    /**
     * Stores models minimum password length.
     * @var int
     */
    protected $minimumPasswordLength;

    /**
     * Stores models attributes and their configuration values
     * @var array
     */

    protected $hashAbleAttributes = [

    ];

    protected $attributesToUnset = [];

    protected $singleOwnerClassName;


    protected $multiOwnerClassNames = [];


    protected $modelAttributes = [
//		START AT ZERO (0)!!! => [
//
//			'name' => 'nameOfAttribute',
//
//			'format' => '(choose 1: email, phoneNumber, url, password,
//							 string, exists, enum, text, id, token, ipAddress, date)',
//
//			'nullable' => false,
//
//			'unique' => true,
//
//			'exists' => null,
//
//          'identifier' => false,
//
//          'key' => false,
//
//
//			'enumValues' => [
//				'item1',
//				'item2',
//				'item3'
//			]
//		],




    ];



    /**
     * Returns the models attributes and configuration values as multi-dimensional array.
     * @return array
     */
    public function getSelfModelAttributes()
    {
        return $this->modelAttributes;
    }

    /**
     * Returns the models minimum password length.
     * @return int
     */
    public function getMinimumPasswordLength()
    {
        return $this->minimumPasswordLength;
    }


    /**
     * Returns the models class as a string.
     * @return string
     */
    public function getClassName()
    {
        return '\\'. get_class($this);
    }


    /**
     * Returns the name of Attribute where the specified setting is set, otherwise error message is thrown.
     * @param $settingName
     * @return string
     */
    public function getAttributeWithSetting($settingName)
    {
        $answer = 'No setting by that name, has it been set?';
        $indefiniteBlock = 12;

        for($x = 0; $answer == 'No setting by that name, has it been set?' || $x > $indefiniteBlock; $x++)
        {
            (!$this->getSelfModelAttributes()[$x][$settingName])
                ?
                :$answer = $this->getSelfModelAttributes()[$x]['name'];
        }
        return $answer;
    }

    public function getHashAbleAttributes()
    {
        return $this->hashAbleAttributes;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSingleOwnerClassName()
    {
        return $this->singleOwnerClassName;
    }


    public function getAttributesToUnset()
    {
        return $this->attributesToUnset;
    }


}
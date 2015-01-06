<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 10:48 AM
 */

namespace App\Polymorphic;


use Symfony\Component\HttpFoundation\File\UploadedFile;

trait ValidatorTrait {

    use InvokerTrait;

    /**
     * Returns true if array passed in contains keys the model will accept as attributes.
     * @param $arrayToCheck
     * @param $modelAttributes
     * @return bool
     */
    public function checkModelAcceptsAttributes($arrayToCheck, $modelAttributes)
    {
        $falseCounter = 0;

        $acceptedAttributes = $this->getModelAttributeNames($modelAttributes);

        foreach($arrayToCheck as $checkIfAttributeIsAccepted => $value)
        {
            (in_array($checkIfAttributeIsAccepted, $acceptedAttributes)) ? : $falseCounter++;
        }

        return($falseCounter > 0) ? false : true;
    }


    /**
     * Returns true if mandatory values are set in arrayToCheck, otherwise false.
     * @param $arrayToCheck
     * @param $modelAttributes
     * @return bool
     */
    public function modelNonNullableAttributesSet($arrayToCheck, $modelAttributes)
    {
        $falseCounter = 0;
        $nullCheck =  $this->getModelAttributeConfiguration($modelAttributes, 'nullable');

        foreach($arrayToCheck as $key => $value)
        {
            if(isset($nullCheck[$key]) && $nullCheck[$key] == false)
            {
                ($value != null) ? : $falseCounter++;
            }
        }
        return ($falseCounter > 0) ? false : true;
    }

    /**
     * Returns true if password is valid, false if password is not valid.
     * @param $passwordToCheck
     * @param null $minLength
     * @param null $minInteger
     * @param null $minLetter
     * @param null $invalidCharacters
     * @return bool
     */
    public function passwordIsValid($passwordToCheck, $minLength = null, $minInteger = null, $minLetter = null,  $invalidCharacters = null)
    {
        //ensure defaults are set
        $defaults = [
            'minLength' => 10,

            'minInteger' => 3,

            'minLetter' => 4,

            'invalidCharacters' => "/[$%^&*()\-_+={}|\\[\]:;\"'<>?,.\/]/",
        ];

        foreach($defaults as $ruleToEnforce => $defaultValue)
        {
            if(!isset(${$ruleToEnforce}))
            {
                ${$ruleToEnforce} = $defaultValue ;
            }
        }

        return ($this->checkMinimumLengthMet($passwordToCheck, $minLength) &&
            $this->checkMinimumIntegersMet($passwordToCheck, $minInteger) &&
            $this->checkMinimumLettersMet($passwordToCheck, $minLetter) &&
            $this->ensureNoInvalidCharactersUsed($passwordToCheck, $invalidCharacters));

    }


    /**
     * Returns true is string to check equal to or greater than minimum length, otherwise false.
     * @param $stringToCheck
     * @param $minLength
     * @return bool
     */
    public function checkMinimumLengthMet($stringToCheck, $minLength)
    {
        return (strlen($stringToCheck) >= $minLength) ? : false;
    }


    /**
     * Returns true if string contains the minimum amount of integers, otherwise false.
     * @param $stringToCheck
     * @param $minInteger
     * @return bool
     */
    public function checkMinimumIntegersMet($stringToCheck, $minInteger)
    {
        return (preg_match_all("/[0-9]/", $stringToCheck) >= $minInteger) ? : false;
    }


    /**
     * Returns true if string contains the minimum amount of letters, otherwise false.
     * @param $stringToCheck
     * @param $minAlphaCharacters
     * @return bool
     */
    public function checkMinimumLettersMet($stringToCheck, $minAlphaCharacters )
    {

        return (preg_match_all("/[A-Za-z]/", $stringToCheck) >= $minAlphaCharacters) ? :false;

    }

    /**
     * Returns true if no invalid characters are found in the string, otherwise false.
     * @param $stringToCheck
     * @param $invalidCharacters
     * @return bool
     */
    public function ensureNoInvalidCharactersUsed($stringToCheck, $invalidCharacters)
    {
        return (preg_match_all($invalidCharacters, $stringToCheck) > 0) ? false :true;
    }

    /**
     * Returns true if email format is valid, otherwise false.
     * @param $emailToCheck
     * @return bool
     */
    public function emailIsValid($emailToCheck)
    {
        return (filter_var($emailToCheck, FILTER_VALIDATE_EMAIL))? true : false ;
    }

    /**Returns true if uploaded file is valid, otherwise false.
     * @param UploadedFile $fileToCheck
     * @return bool
     */
    public function imageIsValid(UploadedFile $fileToCheck)
    {
        return (explode('/', $fileToCheck->getMimeType())[0] == 'image');
    }


    /**
     * Returns true if format of ipAddress passed is valid, otherwise false.
     * @param $ipToCheck
     * @return bool
     */
    public function ipAddressIsValid($ipToCheck)
    {
        return (filter_var($ipToCheck, FILTER_VALIDATE_IP))? true : false ;
    }


    /**Returns true if $fileExtension matches $extensionToMatch, otherwise returns false.
     * @param $fileExtension
     * @param $extensionToMatch
     * @return bool
     */
    public function extensionIsValid($fileExtension, $extensionToMatch)
    {
        return $fileExtension == $extensionToMatch;
    }






    /**
     * Returns true if instances specified exists, otherwise false.
     * @param array $attributes
     * @param array $modelAttributes
     * @return bool
     */
    public function existsIsValid($attributes = array(), $modelAttributes = array())
    {
        $falseCounter = 0;
        $existsCheck = $this->getModelAttributeConfiguration($modelAttributes, 'exists');

        foreach($attributes as $key => $value)
        {
            if($existsCheck[$key] != null)
            {
                $potentialModel = $existsCheck[$key]::find($value);
                if(!is_object($potentialModel) && '\\'. get_class($potentialModel) != $existsCheck[$key])
                {
                    $falseCounter++;
                }
            }
        }
        return ($falseCounter > 0) ? false: true;
    }

    /**
     * Returns true if most credentials are in valid format, otherwise false.
     * DOES NOT RUN ANY {$variable}IsValid METHODS STATED IN $blockFormatCheck ARRAY!!!
     * THOSE MUST BE RUN SEPARATELY!
     * @param array $credentialsToCheck
     * @param array $modelAttributes
     * @return bool
     */
    public function checkMajorFormatsAreValid($credentialsToCheck = array(), $modelAttributes = array())
    {
        $falseCounter = 0;
        $formatValuesForAttributes = $this->getModelAttributeConfiguration($modelAttributes, 'format');
        $blockFormatCheck = ['exists', 'string', 'image'];

        foreach($credentialsToCheck as $attributeName => $attributeValue)
        {
            if(isset($formatValuesForAttributes[$attributeName]) && !in_array($formatValuesForAttributes[$attributeName], $blockFormatCheck))
            {
                $dynamicValidationMethodToCall = $formatValuesForAttributes[$attributeName] .'isValid';
                ($this->$dynamicValidationMethodToCall($attributeValue)) ? : $falseCounter++;
            }

        }

        return ($falseCounter <= 0) ? : false;
    }


    /**
     * Returns true if unique value is not present in database table already, otherwise false.
     * @param $dataToCheck
     * @param $dataName
     * @param $modelClassName
     * @return bool
     */
    public function dataIsUnique($dataToCheck, $dataName, $modelClassName)
    {
        $instanceCheck = $modelClassName::where($dataName, '=', $dataToCheck)->first();

        return ('\\'. get_class($instanceCheck) == $modelClassName)? false : true ;
    }


    /**
     * Returns true if no duplicated data has been passed to a unique attribute, otherwise false.
     * @param array $credentials
     * @param array $modelAttributes
     * @param $modelClassName
     * @return bool
     */
    public function avoidDuplicationOfUniqueData($credentials = array(), $modelAttributes = array(), $modelClassName)
    {
        $falseCounter = 0;
        $uniqueCheck = $this->getModelAttributeConfiguration($modelAttributes, 'unique');

        foreach($credentials as $key => $value)
        {
            if($uniqueCheck[$key] == true)
            {
                ($this->dataIsUnique($value, $key, $modelClassName))? : $falseCounter++;
            }
        }
        return ($falseCounter > 0) ? false: true;
    }



}
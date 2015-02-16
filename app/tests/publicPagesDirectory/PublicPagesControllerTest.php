<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 4:39 PM
 */


class PublicPagesControllerTest extends \App\Base\MasterTestLibrary {


    public function __construct()
    {
        $this->externalService = new PublicPagesController();
    }


    /***********************************************************************************************************/
    /*                                          View Test Cases                                              */
    /***********************************************************************************************************/

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerHomeTests
     */
    public function test_viewHome_route_is_setup()
    {
        $response = $this->GETRoute('/');
        $this->assertResponseOk();
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerSkillsTests
     */
    public function test_viewSkills_route_is_setup()
    {
        $response = $this->GETRoute('/skills');
        $this->assertResponseOk();
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerExperiencesTests
     */
    public function test_viewExperiences_route_is_setup()
    {
        $response = $this->GETRoute('/experiences');
        $this->assertResponseOk();
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerConnectTests
     */
    public function test_viewConnect_route_is_setup()
    {
        $response = $this->GETRoute('/connect');
        $this->assertResponseOk();
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerHomeTests
     */
    public function test_viewHome_view_exists()
    {
        $this->assertViewExists('publicPages.home');
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerSkillsTests
     */
    public function test_viewSkills_view_exists()
    {
        $this->assertViewExists('publicPages.skill');
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerExperiencesTests
     */
    public function test_viewExperiences_view_exists()
    {
        $this->assertViewExists('publicPages.experience');
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesViewTests
     * @group publicPagesControllerConnectTests
     */
    public function test_viewConnect_view_exists()
    {
        $this->assertViewExists('publicPages.connect');
    }



    /***********************************************************************************************************/
    /*                                          Get Data Test Cases                                              */
    /***********************************************************************************************************/


    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerHomeTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataHome_tags_needed_for_view_are_returned()
    {
        $response = $this->GETRoute('/api.v1/');
        $view = $this->getView($response);
        $this->assertEquals('App\DomainLogic\TagDirectory\Tag', get_class($view['tags'][0]));
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerHomeTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataHome_tags_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/');
        $view = $this->getView($response);
        $tagModel = $view['tags'][0];
        $this->assertEquals('\App\DomainLogic\TagDirectory\Tag', $tagModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerHomeTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataHome_tag_skill_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/');
        $view = $this->getView($response);
        $skillModel = $view['tags'][0]['skills'][0];
        $this->assertEquals('\App\DomainLogic\SkillDirectory\Skill', $skillModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerHomeTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataHome_tag_skill_image_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/');
        $view = $this->getView($response);
        $skillModel = $view['tags'][0]['skills'][0];
        $imageModel = $skillModel['images'][0];
        $this->assertEquals('\App\DomainLogic\ImageDirectory\Image', $imageModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_tags_needed_for_view_are_returned()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $tagModels = $view['tags'];
        $this->assertEquals('App\DomainLogic\TagDirectory\Tag', get_class($tagModels[0]));
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_supercategories_needed_for_view_are_returned()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $superCategoryModels = $view['supercategories'];
        $this->assertEquals('App\DomainLogic\SuperCategoryDirectory\SuperCategory', get_class($superCategoryModels[0]));
    }


    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_tag_skill_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $tagModels = $view['tags'];
        $skillsFromFirstTag = $tagModels[0]['skills'];
        $skillModel = $skillsFromFirstTag[0];
        $this->assertEquals('\App\DomainLogic\SkillDirectory\Skill', $skillModel->getClassName());
        //if test causes error: ErrorException: Undefined offset: 0 ..
        //you simply need to ensure the taggables table contains a record
        //with tag_id equal to 1 and the taggable type equal to the Skill class.
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_tag_skill_image_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $tagModels = $view['tags'];
        $skillsFromFirstTag = $tagModels[0]['skills'];
        $skillModel = $skillsFromFirstTag[0];
        $imageModel = $skillModel['images'][0];
        $this->assertEquals('\App\DomainLogic\ImageDirectory\Image', $imageModel->getClassName());

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_superCategory_category_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $superCategoryModels = $view['supercategories'];
        $categoriesFromFirstSuperCategory = $superCategoryModels[0]['categories'];
        $categoryModel = $categoriesFromFirstSuperCategory[0];
        $this->assertEquals('\App\DomainLogic\CategoryDirectory\Category', $categoryModel->getClassName());
        //if test causes error: ErrorException: Undefined offset: 0 ..
        //you simply need to ensure the categories table contains an instance
        //with the 'superCategory_id' property equal to 1.

    }


    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_superCategory_category_skill_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $superCategoryModels = $view['supercategories'];
        $categoriesFromFirstSuperCategory = $superCategoryModels[0]['categories'];
        $categoryModel = $categoriesFromFirstSuperCategory[0];
        $skillsFromCategoryModel = $categoryModel['skills'];
        $skillModel = $skillsFromCategoryModel[0];
        $this->assertEquals('\App\DomainLogic\SkillDirectory\Skill', $skillModel->getClassName());
        //if test causes error: ErrorException: Undefined offset: 0 ..
        //you simply need to ensure the categories table contains an instance
        //with the 'superCategory_id' property equal to 1. &&
        //also that there is a instance in the skills table with the 'category_id' property equal
        //to $categoryModel->id
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_superCategory_category_skill_image_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/skills');
        $view = $this->getView($response);
        $superCategoryModels = $view['supercategories'];
        $categoriesFromFirstSuperCategory = $superCategoryModels[0]['categories'];
        $categoryModel = $categoriesFromFirstSuperCategory[0];
        $skillsFromCategoryModel = $categoryModel['skills'];
        $skillModel = $skillsFromCategoryModel[0];
        $imageModel = $skillModel['images'][0];
        $this->assertEquals('\App\DomainLogic\ImageDirectory\Image', $imageModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerExperiencesTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataExperiences_experiences_needed_for_view_are_returned()
    {
        $response = $this->GETRoute('/api.v1/experiences');
        $view = $this->getView($response);
        $experienceModels = $view['experiences'];
        $experienceModel = $experienceModels[0];
        $this->assertEquals('\App\DomainLogic\ExperienceDirectory\Experience', $experienceModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerExperiencesTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataExperiences_experience_image_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/experiences');
        $view = $this->getView($response);
        $experienceModels = $view['experiences'];
        $experienceModel = $experienceModels[0];
        $imageModel = $experienceModel['images'][0];
        $this->assertEquals('\App\DomainLogic\ImageDirectory\Image', $imageModel->getClassName());
    }




    /***********************************************************************************************************/
    /*                                          Post Data Test Cases                                              */
    /***********************************************************************************************************/

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_route_on_success()
    {
    //      TODO IMPLEMENT
    }


    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_message_on_success()
    {
//      TODO IMPLEMENT
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_route_on_attribute_error()
    {
        //      TODO IMPLEMENT
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_message_on_bad_attributes_error()
    {
//      TODO IMPLEMENT
    }



}

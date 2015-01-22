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
    public function test_getDataHome_entities_are_accessible()
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
    public function test_getDataHome_entity_relationships_are_accessible()
    {
        $response = $this->GETRoute('/api.v1/');
        $view = $this->getView($response);
        $skillModel = $view['tags'][0]['skills'][0];
        $this->assertEquals('\App\DomainLogic\SkillDirectory\Skill', $skillModel->getClassName());
    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_entities_needed_for_view_are_returned()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_entities_are_accessible()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerSkillsTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataSkills_entity_relationships_are_accessible()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerExperiencesTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataExperiences_entities_needed_for_view_are_returned()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerExperiencesTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataExperiences_entities_are_accessible()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerExperiencesTests
     * @group publicPagesGetDataTests
     */
    public function test_getDataExperiences_entity_relationships_are_accessible()
    {

    }




    /***********************************************************************************************************/
    /*                                          Post Data Test Cases                                              */
    /***********************************************************************************************************/

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_view_on_success()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_message_on_success()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_view_on_attribute_error()
    {

    }

    /**
     * @group publicPagesControllerTests
     * @group publicPagesControllerConnectTests
     * @group publicPagesPostDataTests
     */
    public function test_postDataConnect_returns_correct_message_on_bad_attributes_error()
    {

    }

}

<?php
class Content_Test extends WP_UnitTestCase {
    private $plugin;
    protected $post_id = 0;
    public function setUp()
    {

        parent::setUp();
        $this->plugin =new Wp_Thanks_Init();
        $post = array(
            'post_author' => $this->author_id,
            'post_status' => 'publish',
            'post_content' => 'Test Content',
            'post_title' => 'Test Title',
            'post_type' => 'post'
        );
        // insert a post and make sure the ID is ok
        $this->post_id = $this->factory->post->create($post);
        setup_postdata(get_post($this->post_id));
    }

    function testPluginInitialization() {
        $this->assertFalse( null == $this->plugin );
    } // end testPluginInitialization

    function test_check_content(){
        $post = get_post($this->post_id);
        $this->assertContains('Thank you for visiting our website.',$this->plugin->thank_you_end_message($post->post_content));
        $this->assertContains('Test Content',$post->post_content);
    }
}
<?php

class Wp_Thanks_Init {

    function __construct(){
       add_filter ('the_content', array($this,'thank_you_end_message'));
}


function thank_you_end_message($content) {

        $content .= '<font style="color:red"></br>Thank you for visiting our website.</font>';
        return $content;
}
}
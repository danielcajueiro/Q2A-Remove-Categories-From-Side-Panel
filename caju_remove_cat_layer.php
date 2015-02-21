<?php
    if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
        header('Location: ../../');
        exit;
    }

class qa_html_theme_layer extends qa_html_theme_base { 
        function initialize(){
            if(isset($this->content['navigation']['cat']))
                unset($this->content['navigation']['cat']); 
            parent::initialize();
        }
} 

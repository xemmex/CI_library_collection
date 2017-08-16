<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
v1.0
This is library for accessing twig in codeigniter, make sure you have intall twig via composer
and enable composer autoloading
how to use:
install twig by calling composer require twig/twig
copy this file to application/libraries
create view file in application views, example = my_template.html
load this template in application/config/autoload.php
or you can call by loading in each controller $this->load->library('twigTemplate');
render template example = $this->twigtemplate->render('my_template',array('data1'=>$mydata1));
*/
class TwigTemplate {
    function render($tpl,$data=array()){

		$this->CI =& get_instance();
        $loader = new Twig_Loader_Filesystem('application/views');
        $twig = new Twig_Environment($loader);
        $this->CI->load->helper('url');
        $out = array_merge(
          //add your pre-defined variable here,
            array(
                'base_url'=>base_url(),
                ),$data);
        echo $twig->render($tpl.'.html',$out);
    }
}

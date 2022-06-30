<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('FCNxGetLang'))
{
    function FCNxGetLang()
    {
        $CI =& get_instance();
     if($CI->input->get('lang') AND ($CI->input->get('lang')=='th' || $CI->input->get('lang')=='en')){
            $CI->session->set_userdata('language',$CI->input->get('lang'));
            
        }
 
        if(!$CI->session->userdata('language')){
            $CI->session->set_userdata('language','th');
        }else{
            switch ($CI->session->userdata('language')) {
                case 'th':
                    $CI->lang->load('pages', 'thai');
                    break;
                case 'en':
                    $CI->lang->load('pages', 'eng');
                    break;
            }
        }
    }   
}
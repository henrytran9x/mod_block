<?php

namespace Drupal\mod_block\Services;

class MBAdminServices {


    /**
     * Return TRUE if current path is disabled for animate
     */

    function mod_block_animation_exclude_these_paths(){
        $config = \Drupal::config('mod_block.settings');
        if(isset($config)) {
            $action = $config->get('mod_block_animation_pages_init_action');
            $page_list = $config->get('mod_block_animation_pages_list');
            if(!empty($page_list)){
                // Retrieve Drupal alias for the current path (if exists).
                $path =  str_replace('/','',strtolower(\Drupal::service('path.current')->getPath()));
                foreach( explode("\n",$page_list) as $key => $page){
                    $page_match = \Drupal::service('path.matcher')->matchPath($path,$page);
                    if($page_match){
                        return ($action == 'page_disable' ? 1 : 0);
                    }
                }
            }
            return ($action == 'page_disable' ? 0 : 1);
        }
    }
    function _mod_block_animation_animations() {
        return array(
            '' => 'None',
            'flash' => 'flash',
            'shake' => 'shake',
            'bounce' => 'bounce',
            'tada' => 'tada',
            'swing' => 'swing',
            'wobble' => 'wobble',
            'pulse' => 'pulse',
            'flip' => 'flip',
            'flipInX' => 'flipInX',
            'flipInY' => 'flipInY',
            'fadeIn' => 'fadeIn',
            'fadeInUp' => 'fadeInUp',
            'fadeInDown' => 'fadeInDown',
            'fadeInLeft' => 'fadeInLeft',
            'fadeInRight' => 'fadeInRight',
            'fadeInUpBig' => 'fadeInUpBig',
            'fadeInDownBig' => 'fadeInDownBig',
            'fadeInLeftBig' => 'fadeInLeftBig',
            'fadeInRightBig' => 'fadeInRightBig',
            'slideInDown' => 'slideInDown',
            'slideInLeft' => 'slideInLeft',
            'slideInRight' => 'slideInRight',
            'bounceIn' => 'bounceIn',
            'bounceInUp' => 'bounceInUp',
            'bounceInDown' => 'bounceInDown',
            'bounceInLeft' => 'bounceInLeft',
            'bounceInRight' => 'bounceInRight',
            'rotateIn' => 'rotateIn',
            'rotateInUpLeft' => 'rotateInUpLeft',
            'rotateInDownLeft' => 'rotateInDownLeft',
            'rotateInUpRight' => 'rotateInUpRight',
            'rotateInDownRight' => 'rotateInDownRight',
            'lightSpeedIn' => 'lightSpeedIn',
            'lightSpeedLeft' => 'lightSpeedLeft',
            'lightSpeedRight' => 'lightSpeedRight',
            'hinge' => 'hinge',
            'rollIn' => 'rollIn',
            'rollOut' => 'rollOut',
            'zoomIn' => 'ZoomIn',
            'zoomInDown' => 'ZoomInDown',
            'zoomInLeft' => 'ZoomInLeft',
            'zoomInRight' => 'ZoomInRight',
            'zoomInUp' => 'ZoomInUp',
            'zoomOut' => 'ZoomOut',
            'zoomOutDown' => 'ZoomOutDown',
            'zoomOutLeft' => 'ZoomOutLeft',
            'zoomOutRight' => 'ZoomOutRight',
            'zoomOutUp' => 'ZoomOutUp'
        );
    }
}
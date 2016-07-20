<?php

/**
 * @file
 * Contains \Drupal\mod_block\Twig\BlockExtension.
 */

namespace Drupal\mod_block\Twig;

class BlockExtension extends \Twig_Extension{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'render_block';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('render_block', array($this, 'render_block'), array(
                'is_safe' => array('html'),
            )),
        );
    }

    public function render_block($id)
    {

        $block = \Drupal\block\Entity\Block::load($id);
        $block_content = \Drupal::entityManager()
            ->getViewBuilder('block')
            ->view($block);
        if(!$this->check_block_visibility($block)){
            unset($block);
            return ;
        }

        return array('#markup' => drupal_render($block_content));
    }

    public function check_block_visibility($block)
    {
        $visibility = $block->get('visibility');
        if(isset($visibility) && isset($visibility['request_path'])) {
            $negate = $visibility['request_path']['negate'];
            $path =  str_replace('/','',strtolower(\Drupal::service('path.current')->getPath()));
            $pages =  $visibility['request_path']['pages'];
            $page_match = \Drupal::service('path.matcher')->matchPath($path,$pages);
            if($negate == false && $page_match){
                return true;
            }
            elseif($negate == true && $page_match){
                return false;
            }
        }
        else{
            return true;
        }
    }
}
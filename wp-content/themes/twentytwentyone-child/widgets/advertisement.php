<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement extends Widget_Base{

  public function get_name(){
    return 'headingbox';
  }

  public function get_title(){
    return 'Heading Box';
  }

  public function get_icon(){
    return 'eicon-site-title';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]

    );


    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Example Heading'
      ]
    );

    $this->add_control(
      'content_heading',
      [
        'label' => 'Content Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Other Example Heading'
      ]
    );

    $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'Some example content. Start Editing Here.'
      ]
    );

     $this->add_control(
      'read_link_text',
      [
        'label' => 'Button Text',
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => 'Read More',
        'default' => 'Read More'
      ]
    );

    $this->add_control(
      'website_link',
      [
        'label' => __( 'Button Link', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
        'show_external' => true,
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'section_style',
      [
        'label' => 'Heading',
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->start_controls_tabs(
      'style_tabs'
    );

  
     $this->add_control(
        'heading_color', ['label' => __('Heading Color', 'elementor'), 
        'type' => \Elementor\Controls_Manager::COLOR, 
        'default' => '', 
        'selectors' => ['{{WRAPPER}} .advertisement__label-heading' => 'color: {{VALUE}};']]
      );


     $this->add_control(
        'heading_bg_color', ['label' => __('Heading Background Color', 'elementor'), 
        'type' => \Elementor\Controls_Manager::COLOR, 
        'default' => '', 
        'selectors' => ['{{WRAPPER}} .advertisement__label-heading' => 'background-color: {{VALUE}};']]
      );

       $this->add_responsive_control(
        'head_margin',
        [
          'label' => __( 'Margin', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .advertisement__label-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );

      $this->add_responsive_control(
      'head_padding',
      [
        'label' => __( 'Padding', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}} .advertisement__label-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );




      $this->add_control(
      'text_align',
      [
        'label' => __( 'Alignment', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'plugin-domain' ),
            'icon' => 'fa fa-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'plugin-domain' ),
            'icon' => 'fa fa-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'plugin-domain' ),
            'icon' => 'fa fa-align-right',
          ],
          'justify' => [
            'title' => __( 'Justify', 'plugin-domain' ),
            'icon' => 'fa fa-align-justify',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
        'selectors' => ['{{WRAPPER}} .advertisement__label-heading' => 'text-align:{{VALUE}};']
      ]
    );

     $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'style_typography',
        'label' => __( 'Typography', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .advertisement__label-heading'
      ]
    );

   $this->add_control(
      'head_border_radius',
      [
        'label' => __( 'Border Radius', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}}  .advertisement__label-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    // $this->end_controls_tab();
   
    $this->end_controls_section();


    $this->start_controls_section(
      'sub_head_section',
      [
        'label' => __( 'Sub Heading', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );


     $this->add_control(
      'sub_color_text', ['label' => __('Text Color', 'elementor'), 
      'type' => \Elementor\Controls_Manager::COLOR, 
      'default' => '', 
      'selectors' => ['{{WRAPPER}} .advertisement__content__heading' => 'color: {{VALUE}};']]
      );

     $this->add_control(
      'sub_text_align',
      [
        'label' => __( 'Alignment', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'plugin-domain' ),
            'icon' => 'fa fa-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'plugin-domain' ),
            'icon' => 'fa fa-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'plugin-domain' ),
            'icon' => 'fa fa-align-right',
          ],
           'justify' => [
            'title' => __( 'Justify', 'plugin-domain' ),
            'icon' => 'fa fa-align-justify',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'selectors' => ['{{WRAPPER}} .advertisement__content__heading' => 'text-align:{{VALUE}};']
      ]
    );

     $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'sub_style_typography',
        'label' => __( 'Typography', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .advertisement__content__heading',
      ]
    );
   
    $this->end_controls_section();

    $this->start_controls_section(
      'text_section',
      [
        'label' => __( 'Text Content', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );


     $this->add_control(
      'content_color_text', ['label' => __('Text Color', 'elementor'), 
      'type' => \Elementor\Controls_Manager::COLOR, 
      'default' => '', 
      'selectors' => ['{{WRAPPER}} .advertisement_content_text' => 'color: {{VALUE}};']]
      );

     $this->add_control(
      'content_text_align',
      [
        'label' => __( 'Alignment', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'plugin-domain' ),
            'icon' => 'fa fa-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'plugin-domain' ),
            'icon' => 'fa fa-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'plugin-domain' ),
            'icon' => 'fa fa-align-right',
          ],
           'justify' => [
            'title' => __( 'Justify', 'plugin-domain' ),
            'icon' => 'fa fa-align-justify',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'selectors' => ['{{WRAPPER}} .advertisement_content_text' => 'text-align:{{VALUE}};']
      ]
    );

     $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'content_style_typography',
        'label' => __( 'Typography', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .advertisement_content_text',
      ]
    );

      $this->add_responsive_control(
        'content_box_dd_border_margin',
        [
          'label' => __( 'Margin', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'allowed_dimensions' => ['top', 'right', 'bottom', 'left'],
          'default' => ['top'=> ('-10'), 'right' => ('0') ,  'bottom'=> ('0'), 'left'=> ('0'), 'unit'=>'px', 'isLinked'=>true],
            'selectors' => [
            '{{WRAPPER}} .border-content-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );

      $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
          'name' => 'content_box_border',
          'label' => __( 'Border', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .border-content-box',
        ]
      );

      $this->add_control(
      'content_box_border_radius',
      [
        'label' => __( 'Border Radius', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}}  .border-content-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );



   
    $this->end_controls_section();

     $this->start_controls_section(
      'read_btn_section',
      [
        'label' => __( 'Button Style', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );


     $this->add_control(
      'read_btn_color_text', ['label' => __('Text Color', 'elementor'), 
      'type' => \Elementor\Controls_Manager::COLOR, 
      'default' => '', 
      'selectors' => ['{{WRAPPER}} .read-link-text' => 'color: {{VALUE}};']]
      );

     $this->add_control(
      'read_btn_text_align',
      [
        'label' => __( 'Alignment', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'plugin-domain' ),
            'icon' => 'fa fa-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'plugin-domain' ),
            'icon' => 'fa fa-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'plugin-domain' ),
            'icon' => 'fa fa-align-right',
          ],
           'justify' => [
            'title' => __( 'Justify', 'plugin-domain' ),
            'icon' => 'fa fa-align-justify',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
        'selectors' => ['{{WRAPPER}} .readmore-btn' => 'text-align:{{VALUE}};']
      ]
    );

     $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'read_btn_style_typography',
        'label' => __( 'Typography', 'plugin-domain' ),
        'selector' => '{{WRAPPER}} .read-link-text',
      ]
    );


     $this->add_control(
        'read_btn_bg_color', ['label' => __('Button Background Color', 'elementor'), 
        'type' => \Elementor\Controls_Manager::COLOR, 
        'default' => '', 
        'selectors' => ['{{WRAPPER}} .read-link-text' => 'background-color: {{VALUE}};']]
      );

     
     

     $this->add_responsive_control(
        'read_btn_margin',
        [
          'label' => __( 'Margin', 'elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%' ],
          'selectors' => [
            '{{WRAPPER}} .readmore-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );

      $this->add_responsive_control(
      'read_btn_padding',
      [
        'label' => __( 'Padding', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}} .read-link-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );


      $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
          'name' => 'read_btn_border',
          'label' => __( 'Border', 'plugin-domain' ),
          'selector' => '{{WRAPPER}} .read-link-text',
        ]
      );

    $this->add_control(
      'read_btn_border_radius',
      [
        'label' => __( 'Border Radius', 'elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}}  .read-link-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_control(
      'read_btn_icon',
      [
        'label' => __( 'Icon', 'elementor' ),
        'type' => \Elementor\Controls_Manager::ICON,
        'label_block' => true,
        'default' => '',
      ]
    );

     $this->add_control(
      'read_icon_align',
      [
        'label' => __( 'Icon Position', 'elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'left',
        'options' => [
          'left' => __( 'Before', 'elementor' ),
          'Right' => __( 'After', 'elementor' ),
        ],
        'condition' => [
          'read_btn_icon!' => '',
        ],
      ]
    );

     $this->add_control(
      'read_icon_indent',
      [
        'label' => __( 'Icon Spacing', 'elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'max' => 50,
          ],
        ],
        'condition' => [
          'icon!' => '',
        ],
        
        'selectors' => [
          '{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

     $this->add_control(
      'view',
      [
        'label' => __( 'View', 'elementor' ),
        'type' => Controls_Manager::HIDDEN,
        'default' => 'traditional',
      ]
    );
   
    $this->end_controls_section();
}
  

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['advertisement__label-heading'],
      ]
    );

    $this->add_render_attribute(
      'content_heading',
      [
        'class' => ['advertisement__content__heading'],
      ]
    );

    $this->add_render_attribute(
      'border_content_box',
      [
        'class' => ['border-content-box'],
      ]
    );


    $this->add_render_attribute(
      'content',
      [
        'class' => ['advertisement_content_text'],
      ]
    );

    $this->add_render_attribute(
      'read_link_text',
      [
        'class' => ['elementor-button'],
      ]
    );

    $this->add_render_attribute(
      'icon_align',
      [
        'class' => ['elementor-align-icon-' . $settings['read_icon_align']],

      ]
    );

    $icon_align = $settings['read_icon_align'];

    $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
   

    ?>
    
    <div class="advertisement">
      <div <?php echo $this->get_render_attribute_string('label_heading'); ?> class="elementor-heading-title">
        <?php echo $settings['label_heading']?>
      </div>
      <div <?php echo $this->get_render_attribute_string('border_content_box'); ?>>
        <div class="advertisement__content">
          <div class="advertisement__content__heading" <?php echo $this->get_render_attribute_string('content_heading'); ?>>
            <?php echo $settings['content_heading'] ?>
          </div>
          <div class="advertisement_content_text" <?php echo $this->get_render_attribute_string('content'); ?>>
            <?php echo $settings['content'] ?>
          </div>
          <div class="elementor-button-wrapper readmore-btn">
            <a <?php echo $this->get_render_attribute_string('read_link_text'); ?> href="<?php echo $settings['website_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
              <span class="elementor-button-content-wrapper">
                <?php if ( ! empty( $settings['read_btn_icon'] ) ) : ?>
                  <span class="elementor-button-icon elementor-align-icon-<?php echo $icon_align; ?>">
                    <i class="<?php echo esc_attr( $settings['read_btn_icon'] ); ?>" aria-hidden="true"></i>
                  </span>
                <?php endif; ?>
                  <span><?php echo $settings['read_link_text']; ?></span> 
              </span>
            </a>
          </div>
        </div>
        
      </div>
    </div>
  
    <?php
  }

  protected function _content_template(){
    ?>
    <#
        view.addInlineEditingAttributes( 'label_heading', 'basic' );
        view.addRenderAttribute(
            'label_heading',
            {
                'class': [ 'advertisement__label-heading' ],
            }
        );

        view.addInlineEditingAttributes( 'content_heading', 'basic' );
        view.addRenderAttribute(
            'content_heading',
            {
                'class': [ 'advertisement__content__heading' ],
            }
        );

        view.addInlineEditingAttributes( 'border_content_box', 'basic' );
        view.addRenderAttribute(
            'border_content_box',
            {
                'class': [ 'border-content-box' ],
            }
        );

        view.addInlineEditingAttributes( 'content', 'basic' );
        view.addRenderAttribute(
            'content',
            {
                'class': [ 'advertisement_content_text' ],
            }
        );

        view.addInlineEditingAttributes( 'read_link_text', 'basic' );
        view.addRenderAttribute(
            'read_link_text',
            {
                'class': [ 'elementor-button' ],
            }
        );

        view.addInlineEditingAttributes( 'icon_align', 'basic' );
        view.addRenderAttribute(
            'icon_align',
            {
                'class': [ 'elementor-align-icon-'],
            }
        );

        <!-- view.addInlineEditingAttributes( 'read_btn_icon', 'basic' );
        view.addRenderAttribute(
            'read_btn_icon',
            {
                'class': [ 'btn-icon' ],
            }
        );
 -->
      var target = settings.website_link.is_external ? ' target="_blank"' : '';
      var nofollow = settings.website_link.nofollow ? ' rel="nofollow"' : '';
     

        #>
       
       <div class="advertisement">
            <div {{{ view.getRenderAttributeString( 'label_heading' ) }}}>{{{ settings.label_heading }}}</div>
            <div {{{ view.getRenderAttributeString( 'border_content_box' ) }}}>
              <div class="advertisement__content">
                <div {{{ view.getRenderAttributeString( 'content_heading' ) }}}>{{{ settings.content_heading }}}</div>
                <div class="advertisement_content_text">{{{ settings.content }}}
                </div>
                <div class="elementor-button-wrapper readmore-btn">
                      <a {{{ view.getRenderAttributeString( 'read_link_text' ) }}} href="{{ settings.website_link.url }}"{{ target }}{{ nofollow }} >
                          <span class="elementor-button-content-wrapper">
                          <# if ( settings.read_btn_icon ) { #>
                          <span class="elementor-button-icon elementor-align-icon-{{settings.read_icon_align}}">
                            <i class="{{ settings.read_btn_icon }}" aria-hidden="true"></i>
                          </span>
                        <# } #>
                        <span>{{{ settings.read_link_text }}}</span> 
                      </span>
                    </a>
              </div>
              </div>
              
          </div>
        </div>
     
    <?php
  }
}

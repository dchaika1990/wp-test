<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if( class_exists('RevSlider') ) {
    $revSlider = new RevSlider();

    $sliders = $revSlider->getArrSliders(false);
    $choices = array();

    if (!empty($sliders)) {
        foreach ($sliders as $slider) {
            $choices[$slider->getShortcode()] = $slider->getTitle();
        }
    }

    $options = array(

        'slider' => array(
            'type' => 'select',
            'value' => '',
            'label' => esc_html__('Select Slider', 'umodel'),
            'desc' => esc_html__("Select Revolution Slider from the list", 'umodel'),
            'choices' => $choices
        ),
    );
}
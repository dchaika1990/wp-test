<?php
class FW_Option_Type_Form_Builder_Item_Date_Time extends FW_Option_Type_Form_Builder_Item
{
	/**
	 * The item type
	 * @return string
	 */
	public function get_type()
	{
		return 'date-time';
	}

	/**
	 * The boxes that appear on top of the builder and can be dragged down or clicked to create items
	 * @return array
	 */
	public function get_thumbnails()
	{
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title">'.
					'    <div class="item-type-icon"><span class="dashicons dashicons-clock"></span></div>'.
					'    <div class="item-type-title">'. esc_html__('Date Time', 'umodel') .'</div>'.
					'</div>',
			)
		);
	}

	/**
	 * Enqueue item type scripts and styles (in backend)
	 */
	public function enqueue_static()
	{
		$uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/date-time/static');

		wp_enqueue_style(
			'fw-form-builder-item-type-date-time',
			$uri .'/css/backend.css',
			array(),
			fw()->theme->manifest->get_version()
		);

		wp_enqueue_script(
			'fw-form-builder-item-type-date-time',
			$uri .'/js/backend.js',
			array('fw-events'),
			fw()->theme->manifest->get_version(),
			true
		);

		wp_localize_script(
			'fw-form-builder-item-type-date-time',
			'fw_form_builder_item_type_date_time',
			array(
				'l10n' => array(
					'item_title'        => esc_html__('Time', 'umodel'),
					'label'             => esc_html__('Label', 'umodel'),
					'toggle_required'   => esc_html__('Toggle mandatory field', 'umodel'),
					'edit'              => esc_html__('Edit', 'umodel'),
					'delete'            => esc_html__('Delete', 'umodel'),
					'edit_label'        => esc_html__('Edit Label', 'umodel'),
				),
				'options'  => $this->get_options(),
				'defaults' => array(
					'type'    => $this->get_type(),
					'options' => fw_get_options_values_from_input($this->get_options(), array())
				)
			)
		);

		fw()->backend->enqueue_options_static($this->get_options());
	}


	/**
	 * Render item html for frontend form
	 *
	 * @param array $item Attributes from Backbone JSON
	 * @param null|string|array $input_value Value submitted by the user
	 * @return string HTML
	 */
	public function frontend_render(array $item, $input_value)
	{
		$options = $item['options'];
		$attr = array(
			'type'        => 'text',
			'name'        => $item['shortcode'],
			'placeholder' => $options['placeholder'],
			'value'       => is_null( $input_value ) ? '' : $input_value,
			'id'          => 'id-date-' . fw_unique_increment(),
		);
		if ( $options['required'] ) {
			$attr['required'] = 'required';
		}

		return fw_render_view(
			$this->locate_path(
				'/views/view.php',
				// Use this view by default
				get_template_directory() .'/framework-customizations/extensions/forms/includes/builder-items/date-time/view.php'
			),
			array(
				'item' => $item,
				'input_value' => $input_value,
				'attr' => $attr,
			)
		);
	}

	/**
	 * Validate item on frontend form submit
	 *
	 * @param array $item Attributes from Backbone JSON
	 * @param null|string|array $input_value Value submitted by the user
	 * @return null|string Error message
	 */
	public function frontend_validate(array $item, $input_value)
	{
		$options = $item['options'];

		$messages = array(
			'required' => str_replace(
				array('{label}'),
				array($options['label']),
				esc_html__('This {label} field is required', 'umodel')
			),
			'not_existing_choice' => str_replace(
				array('{label}'),
				array($options['label']),
				esc_html__('{label}: Submitted data contains not existing choice', 'umodel')
			),
		);

		if ($options['required'] && empty($input_value)) {
			return $messages['required'];
		}
	}

	private function get_options()

	{
		return array(
			array(
				'g1' => array(
					'type' => 'group',
					'options' => array(
						array(
							'label' => array(
								'type'  => 'text',
								'label' => esc_html__('Label', 'umodel'),
								'desc'  => esc_html__('The label of the field that will be displayed to the users', 'umodel'),
								'value' => esc_html__('Select Time', 'umodel'),
							)
						),
						array(
							'required' => array(
								'type'  => 'switch',
								'label' => esc_html__('Mandatory Field?', 'umodel'),
								'desc'  => esc_html__('If this field is mandatory for the user', 'umodel'),
								'value' => true,
							)
						),
						array(
							'placeholder' => array(
								'type'  => 'text',
								'label' => esc_html__( 'Placeholder', 'umodel' ),
							)
						),
						array(
							'date_time' => array(
								'type'  => 'radio',
								'value' => 'choice-3',
								'label' => esc_html__('Type field', 'umodel'),
								'desc'  => esc_html__('How do you want to use the field?', 'umodel'),
								'choices' => array(
									'date_time' => esc_html__('Date/Time', 'umodel'),
									'date' => esc_html__('Just Date', 'umodel'),
									'time' => esc_html__('Just Time', 'umodel'),
								),
								'inline' => true,
							)
						),
					),
				),
				'icon' => array(
					'type' => 'icon',
					'label' => esc_html__( 'Icon', 'umodel' ),
					'set'   => 'rt-icons-2',
				),
			),
		);
	}
}
FW_Option_Type_Builder::register_item_type('FW_Option_Type_Form_Builder_Item_Date_Time');
?>
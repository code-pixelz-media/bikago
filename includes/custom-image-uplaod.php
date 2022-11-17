<?php 

/* Adding Image Upload Fields */

add_action( 'save_post_bsm_qrcode', 'wpdocs_notify_subscribers', 10, 3 );

function wpdocs_notify_subscribers( $post_id, $post, $update  ) {
	if ( $update ) {
		return;
	}
}

function bikago_attachment_field_credit( $form_fields, $post ) {

	$form_fields['sim_plan'] = array(
        'label' => 'Sim Plan',
        'input' => 'html',
        'helps' => '',
    );

 	$sim_plan = get_post_meta($post->ID, "_sim_plan", true);

 	$sim_status = get_post_meta($post->ID, "_sim_status", true); 

//this is for plan
 	
    $form_fields['sim_plan']['html'] = "<select name='attachments[{$post->ID}][sim_plan]'>";

    $form_fields['sim_plan']['html'] .= '<option selected value="">Select Plan</option>'; 
    
    $form_fields['sim_plan']['html'] .= 
     ( $sim_plan == 'sim-plan-1' ) 
    ? '<option selected value="sim-plan-1">Sim Plan 1</option>' 
    : '<option value="sim-plan-1">Sim Plan 1</option>';

    $form_fields['sim_plan']['html'] .= 
     ( $sim_plan == 'sim-plan-2' ) 
    ? '<option selected value="sim-plan-2">Sim Plan 2</option>' 
    : '<option value="sim-plan-2">Sim Plan 2</option>';

    $form_fields['sim_plan']['html'] .= 
     ( $sim_plan == 'sim-plan-3' ) 
    ? '<option selected value="sim-plan-3">Sim Plan 3</option>' 
    : '<option value="sim-plan-3">Sim Plan 3</option>';

    $form_fields['sim_plan']['html'] .= '</select>';

    $form_fields['sim_status'] = array(
        'label' => 'Sim Status',
        'input' => 'html',
        'helps' => '',
    );

    // this is for status

    $form_fields['sim_status']['html'] = "<select name='attachments[{$post->ID}][sim_status]'>";

    $form_fields['sim_status']['html'] .= '<option value="">Select Status</option>';

    $form_fields['sim_status']['html'] .= 
     ( $sim_status == 'available' ) 
    ? '<option selected value="available">Available</option>' 
    : '<option value="available">Available</option>';

    $form_fields['sim_status']['html'] .= 
     ( $sim_status == 'sold' ) 
    ? '<option selected value="sold">Sold</option>' 
    : '<option value="sold">Sold</option>';

    $form_fields['sim_status']['html'] .= '</select>';
    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'bikago_attachment_field_credit', 10, 2 );

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function bikago_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['sim_plan'] ) )
        update_post_meta( $post['ID'], '_sim_plan', $attachment['sim_plan'] );

    if( isset( $attachment['sim_status'] ) )
        update_post_meta( $post['ID'], '_sim_status', $attachment['sim_status'] );

    return $post;
}

add_filter( 'attachment_fields_to_save', 'bikago_attachment_field_credit_save', 10, 2 );
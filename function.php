add_filter( 'gform_field_validation_4_58', 'validate_list_field_pwd_booking', 10, 4 );
function validate_list_field_pwd_booking( $result, $value, $form, $field )
{
    if ($field->type == 'list') {
        error_log("Values are - ".var_export($value,true));


        foreach ($value as $row_values) {
            error_log("Values Row - ".var_export($row_values,true));
            $column_1 = rgar($row_values, 'label-name'); //get values with field label
            $column_2 = rgar($row_values, 'label-name');
            if (empty($column_1) || empty($column_2)) {
                $has_empty_input = true;
            }
        }

        if ($has_empty_input) {
            $result['is_valid'] = false;
            $result['message'] = 'insert value'; //error message
        }
    }

    return $result;
} 

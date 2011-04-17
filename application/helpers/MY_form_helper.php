<?php
function set_value($field = '', $default = '') // retain search terms in input fields for reference
{
	if (FALSE === ($OBJ =& _get_validation_object()))
	{
		if (isset($_POST[$field]))
		{
			return form_prep($_POST[$field], $field);
		}
		if (isset($_GET[$field]))
		{
			return form_prep($_GET[$field], $field);
		}

		return $default;
	}

	return form_prep($OBJ->set_value($field, $default), $field);
}
<?php

class validation
{

    public function is_empty_value($data, $fields)
    {
        $msg = null;

        foreach ($fields as $value) {
            if (empty($data[$value]))
                $msg .= "the $value field is empty";
        }
        return $msg;
    }
    public function is_valid_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return True;
        }
        return False;
    }
}

?>
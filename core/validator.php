<?php
/**
 * validator.php
 * author: @alviankosim
 */

class Validator
{
    private $rules;
    private $source_data;
    private $err_message;
    
    public function __construct($rules = [], $source_data = null)
    {
        //Do your magic here
        if (count($rules) > 0) {
            $this->rules = $rules;
        }
        if ($source_data) {
            $this->set_source($source_data);
        }
    }

    public function set_rules($data)
    {
        $this->rules = $data;
    }

    public function set_source($data)
    {
        $this->source_data = $data;
    }

    public function validate()
    {
        $this->err_message = null;
        $flag = false;
        foreach ($this->rules as $key_data => $value_rules) {
            $parsing = $this->_parse_rule($key_data, $value_rules);
            $this->err_message = $parsing['message'];
            $flag = $parsing['flag'];

            if (!$flag) break;
        }

        if ($flag) {
            return true;
        }
        return false;
    }

    private function _parse_rule($key_data, $rules)
    {
        $flag = false;
        $message = '';

        // for trimming
        $trim = array_search('trim', $rules);
        if ($trim != FALSE && !isset($this->source_data[$key_data])) {
            if (isset($this->source_data[$key_data])) $this->source_data[$key_data] = trim($this->source_data[$key_data]);
        }

        // for required
        $required = array_search('required', $rules);
        if (is_int($required) && $required >= 0 && ((!isset($this->source_data[$key_data])) || (isset($this->source_data[$key_data]) && $this->source_data[$key_data] == ''))) {
            $message = 'Data '. $key_data .' diperlukan';
            return $this->return_parse_result($flag, $message);
        }

        // for min_length
        $min_length = [...preg_grep('/^min_length/i', $rules)];
        if (count($min_length) > 0 && isset($this->source_data[$key_data])) {
            // $minimum = preg_match('/(?<=\()(.+)(?=\))/is', $min_length[0]);
            preg_match("/\\[(.*?)\\]/", $min_length[0], $minimum);
            if (strlen($this->source_data[$key_data]) < $minimum[1]) {
                $message = 'Data '. $key_data .' minimal '. $minimum[1] .' karakter';
                return $this->return_parse_result($flag, $message);
            }
        }

        $flag = true;
        return $this->return_parse_result($flag, $message);
    }

    private function return_parse_result($flag, $message)
    {
        return [
            'flag'    => $flag,
            'message' => $message
        ];
    }

    public function get_error()
    {
        return $this->err_message;
    }
    
}
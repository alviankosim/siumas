<?php
/**
 * db.php
 * author: @alviankosim
 */
class DB
{
    private $mysql;
    private $active_query;
    private $curr_result;

    function __construct()
    {
        return $this->_init();
    }

    private function _init()
    {
        $this->mysql = @new mysqli(DB_HOST, DB_UNAME, DB_PASS, DB_NAME);

        // Check connection
        if ($this->mysql->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->mysql->connect_error;
            exit();
        }

        return $this;
    }

    public function query($query_string, $binding_params = [])
    {
        $this->active_query = null;
        $statement = $this->mysql->prepare($query_string);
        if (count($binding_params) > 0) {
            $data_types = '';
            foreach ($binding_params as $value) {
                $data_types .= is_string($value) ? 's' : 'i';
            }
            $statement->bind_param($data_types, ...$binding_params);
        }
        $statement->execute();
        $this->active_query = $statement->get_result();
        return $this;
    }

    public function result()
    {
        $this->curr_result = [];

        if ($this->active_query) {
            while ($row = $this->active_query->fetch_assoc()) {
                $this->curr_result[] = $row;
            }
        }

        $arr_obj = json_decode(json_encode($this->curr_result));

        return $arr_obj;
    }

    public function row()
    {
        $this->curr_result = [];

        if ($this->active_query) {
            while ($row = $this->active_query->fetch_assoc()) {
                $this->curr_result[] = $row;
            }
        }

        return count($this->curr_result) > 0 ? ((object) $this->curr_result[0]) : NULL;
    }
}

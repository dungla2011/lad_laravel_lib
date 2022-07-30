<?php

namespace LadLib\Database;

use Illuminate\Database\Eloquent\Model;

trait traitModelExtra
{
    /**
     * Get all fields of a table , and return data type of field
     * @return array [fields => data type]
     */
    public function getTableColumns() {

        if($this instanceof Model);

        $allField = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        $ret = [];
        foreach($allField AS $field_name){
            $val = $this->getConnection()->getDoctrineColumn($this->getTable(), $field_name)->getType()->getName();
            $ret [$field_name] = $val;
            // echo "<br> $field_name | $val";
        }
        return $ret;
    }
}


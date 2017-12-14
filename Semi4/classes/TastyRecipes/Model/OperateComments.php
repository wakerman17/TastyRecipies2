<?php

namespace TastyRecipes\Model;

class OperateComments {
    
    public function exportComments ($result) {
        if (!(is_null($result))) {
            $result_array = array();
            while($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }
            return $result_array;
        }
    }
}
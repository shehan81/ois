<?php

namespace App\Helpers;

class ControllerHelper {

    const ACTIONS_ADD = 'add';
    const ACTIONS_EDIT = 'edit';
    const ACTIONS_DELETE = 'delete';

    public static function getDatatableActions($id = null, Array $actions = []) {
        $html = [];
        $html[self::ACTIONS_ADD] = '';
        $html[self::ACTIONS_EDIT] = '<a href="#edit-'.$id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>';
        $html[self::ACTIONS_DELETE] = '';
        
        if (!empty($actions)) {
            foreach ($actions as $action) {
                switch ($action) {
                    case self::ACTIONS_ADD:
                        break;

                    case self::ACTIONS_EDIT:
                        $html[self::ACTIONS_EDIT] = '<a href="#edit-'.$id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                        break;

                    case self::ACTIONS_DELETE:
                        break;
                }
            }
        }
        
        //str_pad($str,20,".:",STR_PAD_BOTH);
        return implode(" ", $html);
    }

}

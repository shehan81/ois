<?php

namespace App\Helpers;

class Helper {

    const ACTIONS_VIEW = 'view';
    const ACTIONS_EDIT = 'edit';
    const ACTIONS_DELETE = 'delete';

    public static function getDatatableActions($id = null, Array $routes = []) {
        $html = [];
        if (!empty($routes)) {
            foreach ($routes as $action => $route) {
                switch ($action) {
                    case self::ACTIONS_VIEW:
                        $html[self::ACTIONS_VIEW] = '<a href="'. route($route, $id) .'" class="btn btn-xs btn-primary"><i class="fa fa-sticky-note-o"></i> View</a>';
                        break;

                    case self::ACTIONS_EDIT:
                        $html[self::ACTIONS_EDIT] = '<a href="'. route($route, $id) .'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                        break;

                    case self::ACTIONS_DELETE:
                        $html[self::ACTIONS_DELETE] =  self::getDeleteForm($route, $id);
                        break;
                }
            }
            return '<span class="datatable-action-btns">' . implode("</span><span>", $html) . '</span>';
        }
    }
    
    public static function getDeleteForm($route, $id){
        return ('<form action="'.route($route, $id).'" method="POST">
                    <input type="submit" value="Delete" class="btn btn-danger form-button-delete">
                    <input type="hidden" name="_method" value="DELETE">'.
                        csrf_field()
                 .'</form>');
        
        
    }

}

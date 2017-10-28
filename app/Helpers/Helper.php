<?php
/**
 * Author : Shehan Fernando
 * Module : Helper class for controlelrs
 * Date   : 2017-10-22
 */

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
            return '<span class="datatable-action-btns">' . implode("</span><span class='datatable-action-btns'>", $html) . '</span>';
        }
    }
    
    public static function getDeleteForm($route, $id){
        return ('<form action="'.route($route, $id).'" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-xs  btn btn-xs btn-danger confirmation-callback" data-placement="left">
                    <span class="fa fa-remove" aria-hidden="true"> Delete</span></button>'.
                        csrf_field()
                 .'</form>');
    }

}

<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class TranslateComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('jstrans', json_encode(trans('messages')));
    }
}
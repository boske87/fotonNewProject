<?php namespace App\Http\ViewComposers;


use App\ProfMain;
use Illuminate\Contracts\View\View;

class MenuComposer {

    protected $feedback;

    function __construct()
    {

    }


    /**
     * Bind data to the view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $prof = ProfMain::get();
        $view->with(['prof'=>$prof]);

    }
}
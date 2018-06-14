<?php namespace App\Http\ViewComposers;


use App\ProfMain;
use App\UserGalleryImage;
use Auth;
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
        $newImage = array();
        if(Auth::user()){
            $newImage = UserGalleryImage::where('created_at','>=', Auth::user()->last_login)
                ->groupBy('id')
                ->get()->count();
        }



        $view->with(['prof'=>$prof, 'newImage' => $newImage]);

    }
}
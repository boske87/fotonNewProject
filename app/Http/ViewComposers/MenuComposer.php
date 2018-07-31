<?php namespace App\Http\ViewComposers;


use App\Comment;
use App\ProfMain;
use App\User;
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
        $newImageComments = array();
        $newImageCommentsProf = array();

        if(app('request')->has('userId')) {
            $user = User::find(app('request')->input('userId'));

        }

        if(Auth::user()){
            $newImage = UserGalleryImage::where('created_at','>=', Auth::user()->last_login)
                ->groupBy('id')
                ->get()->count();
            $newImageComments = Comment::where('comments.typeId', 0)
                ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
                ->where('comments.created_at','>=', Auth::user()->last_login)
                ->groupBy('comments.imageId')
                ->orderby('comments.id', 'desc')
                ->get()->count();

            $newImageCommentsProf = Comment::where('comments.typeId', 0)
                ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
                ->leftjoin('users', 'comments.userId','=','users.id')
                ->where('comments.created_at','>=', Auth::user()->last_login)
                ->where('users.type', 1)
                ->groupBy('comments.imageId')
                ->orderby('comments.id', 'desc')
                ->get()->count();
        }


        if(app('request')->has('userId')) {
            $view->with(['prof'=>$prof, 'newImage' => $newImage, 'user' => $user,'newImageComments'=>$newImageComments, 'newImageCommentsProf'=> $newImageCommentsProf]);
        } else{
            $view->with(['prof'=>$prof, 'newImage' => $newImage, 'newImageComments'=>$newImageComments, 'newImageCommentsProf'=> $newImageCommentsProf]);
        }
    }
}
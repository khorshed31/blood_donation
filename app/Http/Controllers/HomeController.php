<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Module\Blog\Services\HelperService;
use Module\Blood\Models\Chat;
use Module\Blood\Models\Comment;
use Module\Blood\Models\IsBloodDonate;
use Module\Blood\Models\LikePost;
use Module\Blood\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$data = (new HelperService())->dahboardData();

        $data['posts'] = Post::query()->latest()->activePost()
        ->with('like_posts')
        ->with('comments')
        ->when($request->filled('blood_group'), function ($query) use ($request) {
            $blood_group = $request->blood_group;
            $query->whereIn('blood_group', $blood_group);
        })
        ->paginate(4);

        // $data['users'] = User::whereHas('chat_receives', function($q){
        //                 $q->where('sender_id', auth()->user()->id)->where('is_read',0);
        //             })->with('chat_receives')->get();

                    // dd($data);

        $data['users'] = Chat::where('receiver_id', auth()->user()->id)->where('is_read',0)
                    ->get();
        if ($request->filled('is_ajax')) {

            $view = view('home/_inc/post', $data)->render();
            $status = 0;

            if ($data['posts']->count() > 0) {
                $status = 1;
            }

            return response()->json([
                'html'      => $view,
                'status'    => $status,
                'page'      => $data['posts']->currentPage(),
            ]);

        }

        $isDonate = IsBloodDonate::where('created_by',auth()->user()->id)->where('is_blood_donate',1)->first();
        $different_days = Carbon::parse(optional($isDonate)->date)->diffInMonths();

        if ($different_days >= 3) {

            $isDonate->delete();
        }

        // $date = Carbon::now()->format('m/d/Y');
        
        // $expired_posts = Post::whereRaw("STR_TO_DATE(date, '%m/%d/%Y') <= CURDATE()")->get();

        $expired_posts = Post::where(DB::raw("STR_TO_DATE(date, '%m/%d/%Y') <= CURDATE()"))
        ->orWhere(DB::raw("STR_TO_DATE(date, '%m/%d/%Y') = CURDATE() AND TIME_FORMAT(time, '%h:%m:%s %A') < CURTIME()"))
        ->get();
        
        foreach ($expired_posts as $key => $value) {
            $like_post = LikePost::where('post_id', $value->id)->delete();
            $like_comment = Comment::where('post_id', $value->id)->delete();
            $value->delete();
        }

        return view('home/index', $data);

    }



    public function subscriptionCheck()
    {
        return 12345;
    }


    public function permissionCheck()
    {
        return '1234';
    }
}

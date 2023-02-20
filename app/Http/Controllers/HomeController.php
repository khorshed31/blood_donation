<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Module\Blog\Services\HelperService;
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

        $data['posts'] = Post::query()->latest()
        ->when($request->filled('blood_group'), function ($query) use ($request) {
            $blood_group = $request->blood_group;
            $query->whereIn('blood_group', $blood_group);
        })
        ->paginate(2);

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

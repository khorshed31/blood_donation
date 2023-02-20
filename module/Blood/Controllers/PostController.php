<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module\Blood\Models\Post;

class PostController extends Controller
{
    




    public function index(Request $request)
    {
        //$data = (new HelperService())->dahboardData();

    }






    public function store(Request $request)
    {
        Post::create([

            'description'       => $request->description,
            'blood_group'       => $request->blood_group,
        ]);

        return redirect()->back();

    }




    public function edit(Request $request,$id)
    {
        $data['post'] = Post::query()->find($id);
        $data['posts'] = Post::query()->latest()->searchByField('blood_group')->paginate(2);

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






    public function update(Request $request, $id)
    {
        Post::updateOrCreate(
            [
                'id'        => $id
            ]
            ,[

            'description'       => $request->description,
            'blood_group'       => $request->blood_group,
        ]);

        return redirect()->route('home');

    }






    public function destroy($id)
    {
        try {

            $post = Post::query()->find($id);
            $post->delete();
            if (file_exists($post->image)) {
                unlink($post->image);
            }
        }catch (\Throwable $th){
            dd($th->getMessage());
            return redirect()->route('admin.posts.index')->withError('Something is error');
        }
        return redirect()->back();
    }




}

<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module\Blood\Models\Comment;
use Module\Blood\Models\LikePost;
use Module\Blood\Models\Post;

class PostController extends Controller
{
    




    public function index()
    {
        
        $data['posts'] = Post::where('created_by',auth()->user()->id)
                        ->searchByField('blood_group')
                        ->dateFilter('date')
                        ->latest()
                        ->paginate(25);

        return view('my-feed.index', $data);                

    }



    public function allPost()
    {
        
        $data['posts'] = Post::query()
                        ->searchByField('blood_group')
                        ->searchByField('id')
                        ->dateFilter('date')
                        ->latest()
                        ->paginate(25);

        return view('my-feed.all', $data);                

    }







    public function create()
    {
        return view('request.create');

    }






    public function store(Request $request)
    {
        Post::create([

            'date'                  => $request->date,
            'time'                  => $request->time,
            'place'                 => $request->place,
            'amount_of_blood'       => $request->amount_of_blood,
            'phone'                 => $request->phone,
            'reason'                => $request->reason,
            'blood_group'           => $request->blood_group,
        ]);

        return redirect()->route('home');

    }




    public function edit($id)
    {
        $data['post'] = Post::query()->find($id);

        return view('request.edit', $data);
    }






    public function update(Request $request, $id)
    {
        Post::updateOrCreate(
            [
                'id'        => $id
            ]
            ,[

                'date'                  => $request->date,
                'time'                  => $request->time,
                'place'                 => $request->place,
                'amount_of_blood'       => $request->amount_of_blood,
                'phone'                 => $request->phone,
                'reason'                => $request->reason,
                'blood_group'           => $request->blood_group,
        ]);

        return redirect()->route('admin.posts.index')->withMessage('Update Success');

    }






    public function changeStatus(Request $request, $id)
    {

        isset($request->status) ? $status = 1 : $status = 0;

        Post::updateOrCreate(
            [
                'id'        => $id
            ]
            ,[

                'status'                  => $status,
        ]);

        return redirect()->route('admin.posts.all')->withMessage('Status Change Success');

    }




    public function commentStore(Request $request)
    {

        Comment::updateOrCreate(
            [
                'post_id'        => $request->post_id,
                'created_by'        => auth()->user()->id,
            ]
            ,[

                'comment'                  => $request->comment,
        ]);

        return redirect()->back();

    }





public function isManaged(Request $request)
    {

        Post::updateOrCreate(
            [
                'id'        => $request->post_id,
            ]
            ,[

                'is_managed'                  => $request->is_managed,
        ]);

        $post = Post::query()->find($request->post_id);
            LikePost::where('post_id', $post->id)->delete();
            Comment::where('post_id', $post->id)->delete();
         $post->delete();   


        return redirect()->back();

    }




    public function destroy($id)
    {
        try {

            $post = Post::query()->find($id);
            LikePost::where('post_id', $post->id)->delete();
            Comment::where('post_id', $post->id)->delete();
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



    public function addToLike(Request $request)
    {

        if (LikePost::where('post_id', $request->post_id)->where('created_by', auth()->id())->first()) {
            return response()->json(
                [
                    'success' => 0,
                ]
            );
        }

        LikePost::create(
            [
                'post_id'           => $request->post_id,
            ]);

        return response()->json(
            [
                'success' => true,
                'total'   => LikePost::where('post_id', $request->post_id)->count(),
            ]
        );
    }



    public function deleteLike(Request $request)
    {

        try
        {
            $like = LikePost::query()
                ->where('post_id',$request->post_id)
                ->where('created_by',auth()->user()->id);

            $like->delete();

            return response()->json(
                [
                    'success' => true,
                    'total'   => LikePost::where('post_id', $request->post_id)->count(),
                ]
            );
        }

        catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }




}

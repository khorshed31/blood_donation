<?php


use Module\Blog\Models\Blog;

function redirectIfError($error, $with_input = null)
{
    if (request()->dev == 1) {
        throw $error;
    }
    if ($with_input) {
        return redirect()->back()->withInput(request()->except('image'))->withError($error->getMessage());
    }
    return redirect()->back()->withError($error->getMessage());
}




function category(){

    return \Module\Blog\Models\Category::query()->get();
}




function recentPost(){

    return Blog::query()->publishBlog()
        ->with('category')
        ->latest()->take(3)->get();
}




function account($id)
{
    if ($id == 1) {
        return 'Cash';
    } elseif ($id == 2) {
        return 'Bank';
    } else {
        return 'Mobile Wallet';
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $posts=User:: join('posts', 'posts.user_id', '=', 'users.id')
//            ->join('categories', 'categories.id', '=', 'posts.category_id')
//            ->get();
        if (Auth::user()){
            $posts = Post::with('category', 'user')->get();
        return view('post.index', compact('posts'));
    }else {
      return redirect(route('login'))->with('message'.'Plz login first');
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users= User::all();
        $categorys=Category::all();
        return  view('post.create',compact('users','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'img' => 'required|mimes:jpeg,png|max:2048',

        ]);

        if ($request->hasFile('img')) {
            $files = $request->file('img');
            $originalName = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = time() . '_' . $originalName ;
            $image_resize = Image::make($files->getRealPath());
            $image_resize->resize(150, 150);
            $image_resize->save(public_path('images/' .$filename));
            $savePathInDB = 'images/' . $filename;
        }

        $p = Post::create(
            [
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
                'img' => $savePathInDB
            ]);
//        $post =new Post($request->all());
//        $post->save();

        return redirect(route('post.index'))->with('message','POST CREAATE SUCESSFYLLY');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::find($id);
        $users  =User::all();
        $categorys=Category::all();
        return  view('post.create',compact('posts','users','categorys'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'img' => 'required|mimes:jpeg,png|max:2048',

        ]);

        if ($request->hasFile('img')) {
            $files = $request->file('img');
            $originalName = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = time() . '_' . $originalName ;
            $image_resize = Image::make($files->getRealPath());
            $image_resize->resize(150, 150);
            $image_resize->save(public_path('images/' .$filename));
            $savePathInDB = 'images/' . $filename;
        }


        $data=[
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'img' => $savePathInDB
        ];
        Post::where('id',$id)->update($data);
        return redirect(route('post.index'))->with('message','Post update sucessfully');

//        $pid = Post::find($id);
//        $pid->update($request->all());
//        $pid->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pid = Post::find($id);
        $pid->delete();
        return redirect(route('post.index'))->with('message','Post Deleted sucessfully');
    }
}

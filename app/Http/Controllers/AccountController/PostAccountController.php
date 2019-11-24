<?php

namespace App\Http\Controllers\AccountController;

use App\Models\PostUser;
use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreatePost;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Users;
use App\Models\Post;


class PostAccountController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req, Post $post,Users $user)

    {
        $username = $req->session()->get('user_name');
        $data['user_post'] = $post->getPostInfoByAcc($username);
        $data['user'] =$user->getInfoUser($username);

        //dd($data);
        return view('core.content.account.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $cat,Tag $tag)
    {   
        $data = [];
        $data['cate']=$cat->getChildCate();
        $data['tag']=$tag->getAllTag();
        
        //dd($data);

        return view('core.content.account.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost $request)
    {




        $thumbnail = $request->thumbnail;
        $title = $request->titlePost;
        $slug = Str::slug($title,'-');
        $sapoPost = $request->sapoPost;
        $contentPost = $request->contentPost;
        $language=$request->language;
        $categories =$request->categories;
        $tag = $request->tags;
        $userId= $request->session()->get('id');  
        // $request->flash();
        //dd($request->old());    

         // $validator = Validator::make(Input::all(), $request->rules());
        //kiem tra nguoi dung co upload file ko


        $nameFile = null;      

        $publish = $request->publishPost;
        
        // if ($publish === 'on') {
        //     $status = 1;
        //     $publishDate = date('Y-m-d H:i:s');
        // }

        if ($request->hasFile('thumbnail')) {
                //kiem tra xem file co bi loi ko
            if ($request->file('thumbnail')->isValid()) {
                    //thuc hien upload
                $file = $request->file('thumbnail');
                $nameFile=$file->getClientOriginalName();
                if ($nameFile) {
                        # code...
                 $upload= $file->move('upload/img',$nameFile);
             }
         }
     }
        //data to insert ---> 
        //data post table
     $dataPost=[
        'title'=> $title,
        'slug'=> $slug,
        'sapo'=> $sapoPost,
        'categories_id'=> $categories,
        'thumbnail' => $nameFile,
        'status'=> 3,
        'publish_date'=>date('Y-m-d H:i:s'),
                // 'lang_id'=> $language,
        'user_id'=>$userId,
        'created_at' =>date('Y-m-d'),
        'updated_at' => null,
    ];




        ///insert data
    DB::table('posts')->insert($dataPost);
    $idPost = DB::getPdo()->lastInsertId();
        //data content table
    $dataContent=[
        'post_id' => $idPost,
        'content'=>$contentPost,           
        'create_at' =>date('Y-m-d'),
        'update_at' => null 
    ];
    DB::table('content')->insert($dataContent);
        // dd($idPost);

        //insert bang post tag
    if ($tag && is_array($tag)) {
        foreach ($tag as $key => $value) {
            DB::table('post_tag')->insert([
                'post_id' => $idPost,
                'tag_id' => $value,
                'primary' => 0,
                'create_at' => date('Y-m-d'),
                'update_at' => null,
            ]);
        }
    }

    return redirect()->route('acc.index')->with('status','Post created !!');
    
}





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function show(PostUser $postUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Post $post, Category $cat,Tag $tag,$slug,$id)
    {   
         //dd($id,$slug);
        $data =[];
        $data['cate']=$cat->getChildCate();
        $data['tag']=$tag->getAllTag();
        $data['old']=$post->getAllDataPost($id);
        //dd($data);
        return view('core.content.account.update',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idPost = $request->id;
        $thumbnail = $request->thumbnail;
        $title = $request->titlePost;
        $slug = Str::slug($title,'-');
        $sapoPost = $request->sapoPost;
        $contentPost = $request->contentPost;
        $language=$request->language;
        $categories =$request->categories;
        $tag = $request->tags;
        $userId= $request->session()->get('id');
        $publish = $request->publishPost;
        $status = 3;
        $nameFile = null;      

        
       

        if ($request->hasFile('thumbnail')) {
            //kiem tra xem file co bi loi ko
            if ($request->file('thumbnail')->isValid()) {
                //thuc hien upload
                $file = $request->file('thumbnail');
                $nameFile=$file->getClientOriginalName();
                if ($nameFile) {
                    # code...
                 $upload= $file->move('upload/img',$nameFile);
             }
         }
     }
     //dd($nameFile);
     $data=[
        'title'=>$title,
        'slug'=>$slug,
        'sapo'=>$sapoPost,
        'thumbnail'=>$nameFile,
        'categories_id'=>$categories,
        'user_id'=>$userId,
        'status' => $status,
        'updated_at'=> date('Y-m-d'),
    ];

    $dataPost=[
        'content' => $contentPost,
        'update_at' => date('Y-m-d')

    ];
    DB::table('posts')->where('id', $idPost)->update($data);
    DB::table('content')->where('post_id', $idPost)->update($dataPost);
    return redirect()->route('acc.index')->with('status','Post ' .$slug. ' updated !!');


        //dd($a);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $useridsession= $request->session()->get('id');
        $userid=$request->userId;
        //dd($id);
        if ($useridsession == $userid) {
            DB::table('posts')->where('id', $id)->delete();
            DB::table('content')->where('post_id', $id)->delete();
        } else {
         dd('no');
     }

     return redirect()->back();
 }
     public function disable(Request $request,$id)
     {

        DB::table('posts')->where('id', $id)->update(['status'=>4]);
        return redirect()->back();
    }
    public function enable(Request $request,$id)
     {

        DB::table('posts')->where('id', $id)->update(['status'=>1]);
        return redirect()->back();
    }


    public function offComment(Request $request,$id)
    {
        DB::table('posts')->where('id',$id)->update(['status'=>2]);
         return redirect()->back();
    }
    public function onComment(Request $request,$id)
    {
        DB::table('posts')->where('id',$id)->update(['status'=>1]);
         return redirect()->back();
    }
}

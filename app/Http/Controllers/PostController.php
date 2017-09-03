<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    //列表页
    public function index(){

        $posts = Post::orderBy('created_at','desc')->paginate(6);

        return view("post/index",compact('posts'));
    }

    //详情页
    public function show(Post $post){

        return view("post/show",compact('post'));

    }

    //创建页面
    public function create(){

        return view("post/create");

    }

    //创建提交请求
    public function store(){

        //第一种提交数据方式
//        $post = new Post();
//        $post->title = request('title');
//        $post->content = request('content');
//        $post->save();
//        dd(\Request::all());
//        dd(request()->all());

        //第二种提交方式
//        $params = ['title' =>  \request('title'),'content' => \request('content')];
        $params = \request(['title','content']);

        Post::create($params);

//        var_dump($result);
        return redirect("/posts/list");


    }

    //编辑页面
    public function edit(){
        return view("post/edit");
    }

    //编辑逻辑
    public function update(){
        return;
    }

    //删除逻辑
    public function delete(){
        return;
    }


}
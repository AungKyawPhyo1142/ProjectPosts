<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function mainPage(){

        $posts = Post::when(request('searchKey'),function($query){
            $filter = request('filterOption');
            $searchKey = request('searchKey');

            if($filter!='filter'){
                $query->where($filter,'like','%'.$searchKey.'%');
            }

        })
        ->orderBy('created_at','desc')
        ->paginate(3);

        return view('mainPage',compact('posts'));

    }

    public function inputData(Request $req){

        $this->validationCheck($req);
        $data = $this->getData($req);

        if($req->hasFile('postImage')){
            $fileName = uniqid().'_kein_'.$req->file('postImage')->getClientOriginalName();
            $req->file('postImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        Post::create($data);
        return redirect()->route('posts#mainPage')->with(['createSuccess'=>'Post Created Successfully!']);
    }

    public function showData($id){
        $data = Post::where('id',$id)->first()->toArray();
        return view('showPage',compact('data'));
    }

    public function deleteData($id){
        Post::where('id',$id)->delete();
        return redirect()->route('posts#mainPage')->with(['deleteSuccess'=>'Post Deleted Successfully!']);
    }

    public function editPage($id){
        $data = Post::where('id',$id)->first()->toArray();
        return view('editPage',compact('data'));
    }

    public function updateData(Request $req,$id){
        $data = $this->getData($req);

        if($req->hasFile('postImage')){

            // delete old image
            $oldImageName = Post::select('image')->where('id',$id)->first()->toArray();
            $oldImageName = $oldImageName['image'];
            Storage::delete('public/'.$oldImageName);

            $fileName = uniqid().'_kein_'.$req->file('postImage')->getClientOriginalName();
            $req->file('postImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        Post::where('id',$id)->update($data);
        return redirect()->route('posts#mainPage')->with(['updateSuccess'=>'Post Updated Successfully!']);
    }

    //------------------- Private Functions ---------------------

    // get the data
    private function getData($req){

        return [
            'title' => $req->postTitle,
            'price' => $req->postPrice,
            'description' => $req->postDescription,
            'rating' => $req->postRating,
            'city' => $req->postCity,
        ];
    }

    // validation check
    private function validationCheck($req){

        // validation Rules
        $Rules = [
            'postTitle' => 'required',
            'postDescription' => 'required|min:5',
            'postPrice' => 'required',
            'postCity' => 'required',
            'postRating' => 'required|max:5',
            'postImage' => 'mimes:jpg,jpeg,png'
        ];

        Validator::make($req->all(),$Rules)->validate();

    }

}

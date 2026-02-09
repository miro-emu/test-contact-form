<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function modify(){
        return redirect('/')
                        ->withInput();
    }


    public function confirm(ContactRequest $request){
        $contact =$request->validated();
        $contact['name'] = $request->last_name . ' ' . $request->first_name;
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $contact['gender_text'] = $genderText[$request->gender];
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        $category = Category::find($request->category_id);
        $contact['category_content'] = $category->content;

        return view('confirm' , compact('contact'));
    }


    public function store(ContactRequest $request){
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'category_id',
            'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function category(){
    return $this->belongsTo(Category::class);
    }

}

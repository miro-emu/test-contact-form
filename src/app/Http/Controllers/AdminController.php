<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        // $contacts = Contact::all();
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);
        return view('admin' , compact('categories','contacts'));
    }

    public function getGenderTextAttribute()
    {
        return [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ][$this->gender] ?? '';
    }



    public function exportCsv(){
        $contacts = Contact::with('category')->get();

        $response = new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                '名前',
                '性別',
                'メールアドレス',
                'カテゴリ',
                '内容'
            ]);
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender,
                    $contact->email,
                    $contact->category->content ?? '',
                    $contact->detail,
                ]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }

    public function search(Request $request){
        $categories = Category::all();

        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->CategorySearch($request->category_id)
            ->GenderSearch($request->gender)
            ->DateSearch($request->date)
            ->paginate(7);

        return view('search', compact('contacts', 'categories'));
    }



}

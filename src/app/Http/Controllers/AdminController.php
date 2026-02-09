<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class AdminController extends Controller
{
    public function admin(Request $request){
        $contacts = Contact::all();
        $categories = Category::all();
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $contacts = Contact::with('category')->paginate(7);
        $contacts->getCollection()->transform(function ($contact) use ($genderText) {
        $contact->gender_text = $genderText[$contact->gender] ?? '';
        return $contact;
        });

        $showModal = false;
        $selectedContact = null;

        if ($request->filled('contact_id')) {
            $selectedContact = Contact::with('category')
                ->find($request->contact_id);

            if ($selectedContact) {
                $selectedContact->gender_text =
                    $genderText[$selectedContact->gender] ?? '';
                $showModal = true;
            }
        }

        return view('admin' , compact('categories','contacts','selectedContact','showModal'));
    }

    public function exportCsv(Request $request){
        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->CategorySearch($request->category_id)
            ->GenderSearch($request->gender)
            ->DateSearch($request->date)
            ->get();

        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $response = new StreamedResponse(function () use ($contacts, $genderText) {
            $handle = fopen('php://output', 'w');
            $header = [
                '名前',
                '性別',
                'メールアドレス',
                'カテゴリ',
                '内容'
            ];
            mb_convert_variables('SJIS-win', 'UTF-8', $header);
            fputcsv($handle, $header);

            foreach ($contacts as $contact) {
                $row = [
                $contact->last_name . ' ' . $contact->first_name,
                $genderText[$contact->gender] ?? '',
                $contact->email,
                $contact->category->content ?? '',
                $contact->detail,
            ];

            // ★ここが超重要
            mb_convert_variables('SJIS-win', 'UTF-8', $row);
            fputcsv($handle, $row);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }

    public function search(Request $request)
{
    $categories = Category::all();
    $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

    $query = Contact::query();

    // ① キーワード検索（部分一致）
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;

        $query->where(function ($q) use ($keyword) {
            $q->where('first_name', 'LIKE', "%{$keyword}%")
              ->orWhere('last_name', 'LIKE', "%{$keyword}%")
              ->orWhere('email', 'LIKE', "%{$keyword}%")
              ->orWhere('detail', 'LIKE', "%{$keyword}%");
        });
    }

    // ② カテゴリ
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // ③ 性別
    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    // ④ 日付
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->paginate(7)->withQueryString();

    $contacts->getCollection()->transform(function ($contact) use ($genderText) {
        $contact->gender_text = $genderText[$contact->gender] ?? '';
        return $contact;
    });
    
    $showModal = false;
        $selectedContact = null;

        if ($request->filled('contact_id')) {
            $selectedContact = Contact::with('category')
                ->find($request->contact_id);

            if ($selectedContact) {
                $selectedContact->gender_text =
                    $genderText[$selectedContact->gender] ?? '';
                $showModal = true;
            }
        }


    return view('search', compact('contacts', 'categories','selectedContact','showModal'));
}


    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect()->route('delete.complete');
    }

    public function reset(Request $request)
    {
        $contacts = Contact::all();
        $categories = Category::all();
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $contacts = Contact::with('category')->paginate(7);
        $contacts->getCollection()->transform(function ($contact) use ($genderText) {
        $contact->gender_text = $genderText[$contact->gender] ?? '';
        return $contact;
        });

        $showModal = false;
        $selectedContact = null;

        if ($request->filled('contact_id')) {
            $selectedContact = Contact::with('category')
                ->find($request->contact_id);

            if ($selectedContact) {
                $selectedContact->gender_text =
                    $genderText[$selectedContact->gender] ?? '';
                $showModal = true;
            }
        }

        return view('reset' , compact('categories','contacts','selectedContact','showModal'));
    }



}

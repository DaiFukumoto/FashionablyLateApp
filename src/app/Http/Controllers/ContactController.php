<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

// お問い合わせフォーム
class ContactController extends Controller
{
    // 入力画面の初期表示
    public function index()
    {
        $contact = [
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'email' => '',
            'tell_1' => '',
            'tell_2' => '',
            'tell_3' => '',
            'address' => '',
            'building' => '',
            'category_id' => '',
            'detail' => ''
        ];
        $categories = Category::all();
        return view('contact', compact('contact', 'categories'));
    }

    // 入力画面の表示
    public function contact(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);
        $categories = Category::all();
        return view('contact', compact('contact', 'categories'));
    }

    // 確認画面の表示
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));
    }

    // 入力内容の送信
    public function store(ContactRequest $request)
    {
        $contact_tmp = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);
        $contact = [
            'first_name' => $contact_tmp['first_name'],
            'last_name' => $contact_tmp['last_name'],
            'gender' => $contact_tmp['gender'],
            'email' => $contact_tmp['email'],
            'tell' => $contact_tmp['tell_1'] . $contact_tmp['tell_2'] . $contact_tmp['tell_3'],
            'address' => $contact_tmp['address'],
            'building' => $contact_tmp['building'],
            'category_id' => $contact_tmp['category_id'],
            'detail' => $contact_tmp['detail']
        ];
        Contact::create($contact);
        return view('thanks');
    }
}

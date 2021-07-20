<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function checkRole(){
        echo "<br>2. MainController@checkRole";
        echo "<br>Main Controller: checkRole function";
        echo "<br>Thực hiện sau khi qua bộ lọc Middleware và trước khi gửi HTTP response";
    }

    public function showNew($news_id_string){
        $news_id_arr = explode('-', $news_id_string);
        $news_id = end($news_id_arr);

        // Thực hiện lấy thông tin về bài viết $news_id, bài viết đưa ra ví dụ ở mức đơn giản
        $news_title = 'Bài viết Laravel mới với ID là ' . $news_id;
        // Các xử lý khác

        return view('hello-world')->with(['news_id' => $news_id, 'news_title' => $news_title]);
    }

    public function uriTest(Request $request){
        // ví dụ URL http://laravel.dev/category/laravel-nang-cao
        $uri = $request->path();
        // trả về category/laravel-nang-cao
        echo $uri;
    
        if ($request->is('admin/*')) {
            // các đường dẫn bắt đầu bằng admin/ được xử lý
            // ví dụ http://laravel.dev/admin/product/create, http://laravel.dev/admin/news/create
            echo '<br>Admin path';
        }
        if ($request->is('category/laravel-nang-cao')) {
            echo '<br>Đường dẫn bạn vừa truy nhập đúng là http://laravel.dev/' . $request->path();
        }
    
        // ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
        $url = $request->url();
        // trả về http://laravel.dev/category/laravel-nang-cao
        echo '<br>Đường dẫn đầy đủ: ' . $url;
    
        // ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
        $full_url = $request->fullurl();
        // trả về http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
        echo '<br>Đường dẫn đầy đủ cả query string' . $full_url;
    
        $method = $request->method();
        if ($request->isMethod('post')) {
            echo '<br>POST request';
        } else {
            echo '<br>GET request';
        }
    }
    public function getUserInfo(Request $request){
        echo '<br>gui thanh cong' ;
    }
   
    public function insertMessage(Request $request){
        $name    = $request->input('name');
        $email   = $request->input('email');
        $title   = $request->input('title');
        $message = $request->input('message');
    
        // Lưu cookie trong 30 phút
        $minutes = 30;
        $name_cookie = cookie('name', $name, $minutes);
        $email_cookie = cookie('email', $email, $minutes);
    
        // Insert message vào database, tạm thời coi như đã cập nhật database
        // chúng ta sẽ trở lại phần này trong những bài viết sau
    
        $data = ['success' => 'Bạn đã gửi tin nhắn thành công!'];
        return response()
            ->view('fontend.contact', $data, 200)
            ->withCookie($name_cookie)
            ->withCookie($email_cookie);

       
    }

    public function showContactForm(Request $request){
        $name  = $request->cookie('name');
        $email = $request->cookie('email');
    
        return view('fontend.contact')->with(['name' => $name, 'email' => $email]);
    }
    public function showContactForms(Request $request){
        $name    = $request->input('name');
        $email   = $request->input('email');
    
        return view('fontend.contact')->with(['name' => $name, 'email' => $email]);
    }
}

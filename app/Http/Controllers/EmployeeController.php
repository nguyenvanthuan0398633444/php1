<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;

class EmployeeController extends Controller
{
    public function showEmployeeForm(){

      $employees= DB::table('users')->get();
        return view('fontend.Employee')->with('employees',$employees);
    }
    public function delete($id){
      $deleted = DB::delete('delete from users where id = ?', [$id]);
      $employees= DB::table('users')->get();
      return view('fontend.Employee')->with('employees',$employees);
    }
    public function add(Request $request){   
      $messages = [
          'required' => 'Trường :attribute bắt buộc nhập.',
          'email'    => 'Trường :attribute phải có định dạng email'
      ];
      $validator = Validator::make($request->all(), [
              'name'     => 'required|max:255',
              'email'    => 'required|email',
              'address' => 'required|max:255'                  
          ], $messages);
  
          if ($validator->fails()) {
              return redirect('employee')
                      ->withErrors($validator)
                      ->withInput();
          } else {
            // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
            $name = $request->input('name');
            $email = $request->input('email');
            $address = $request->input('address');
              
            DB::insert('insert into users (name, email, address) values (?, ?, ?)', [$name, $email, $address]);
            return redirect('employee')
                ->with('message', 'Đăng ký thành công.');
          }
    
  }
}

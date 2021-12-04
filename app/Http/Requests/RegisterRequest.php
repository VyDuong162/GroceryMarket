<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kh_hoTen' =>'required|min:5|max:100',
            'kh_ngaySinh' =>'required',
            'kh_soDienThoai' =>'required|max:10',
            'kh_email' =>'required|email',
            'ttp_ma' =>'required',
            'qh_ma' =>'required',
            'px_ma' =>'required',
            'dc_ten' =>'required|min:5|max:100',
            'kh_taiKhoan' =>'required|min:5|max:100|unique:khachhang',
            'kh_matKhau' =>'required|min:5|max:100',
            'kh_matKhau1' =>'required|min:5|max:100',
        ];
    }
    public function messages()
    {
        return [
            'kh_hoTen.required'=>"vui lòng nhập họ tên",
            'kh_hoTen.min'=>"Họ tên ít nhất >= 5 ký tự",
            'kh_hoTen.max'=>"Họ tên tối đa <= 100 ký tự",
            'kh_ngaySinh.required' =>"vui lòng nhập ngày sinh",
            'kh_soDienThoai.required' =>'Vui lòng nhập số điện thoại',
            'kh_soDienThoai.max' =>'Số điện thoại phải 10 ký tự',
            'kh_email.required' =>'vui lòng nhập email',
            'kh_email.email' =>'email không đúng định đạng',
            'ttp_ma' =>'vui lòng chọn',
            'qh_ma' =>'vui lòng chọn',
            'px_ma' =>'vui lòng chọn',
            'dc_ten.required' =>'vui lòng nhập địa chỉ cụ thể',
            'dc_ten.min' =>'Địa chỉ ít nhất >= 5 ký tự',
            'dc_ten.max' =>'Địa chỉ tối đa <= 100 ký tự',
            'kh_taiKhoan.required' =>'vui lòng nhập tài khoản',
            'kh_taiKhoan.min' =>'Địa chỉ ít nhất >= 5 ký tự',
            'kh_taiKhoan.max' =>'Địa chỉ tối đa <=100 ký tự',
            'kh_taiKhoan.unique' =>'Tài khoản đã tồn tại',
            'kh_matKhau.required' =>'vui lòng nhập mật khẩu',
          
            'kh_matKhau.min' =>'Mật khẩu ít nhất >= 5 ký tự',
            'kh_matKhau.max' =>'Mật khẩu tối đa <=100 ký tự',
            'kh_matKhau1.required' =>'vui lòng nhập mật khẩu',
            'kh_matKhau1.min' =>'Mật khẩu ít nhất >= 5 ký tự',
            'kh_matKhau1.max' =>'Mật khẩu tối đa <=100 ký tự',
        
        ];
    }
}

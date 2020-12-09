<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;

class pgcontroller extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();

    	$new_product = Product::where('new',1)->paginate(4);
    	$sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSP($typesanpham){
        
        $sanpham_theoloai = Product::where('id_type',$typesanpham)->get();
        if (count($sanpham_theoloai) >0) {
            $sanpham_khac= Product::where('id_type','<>',$typesanpham)->paginate(3);
            $loai = ProductType::all();
            $loaisanpham = ProductType::where('id',$typesanpham)->first();
            return view('page.loai_sp',compact('sanpham_theoloai', 'sanpham_khac', 'loai', 'loaisanpham'));
        }
        else{
            return redirect()->back();
        }
    	
    }

    public function getChitiet(Request $req){
    	$sanpham = Product::where('id',$req->id)->first();
    	$tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
    	return view('page.chitiet_sanpham',compact('sanpham', 'tuongtu', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }
    public function postLienHe(Request $req){
        $this->validate($req,
            [
                'name'=>'required',
                'email'=>'required|email'

            ],
            [
                'name.required'=>'Vui lòng nhập tên',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',

            ]);


    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }

    public function getAddToCart(Request $req,$id){
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product,$id);
    	$req->Session()->put('cart',$cart);
    	return redirect()->back();
    }

    public function getDelCart($id){
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	if(count($cart->items)>0){
    		Session::put('cart',$cart);
    	}
    	else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }

    public function getDatHang(){
    	return view('page.dathang');
    }
    
    public function postDatHang(Request $req){
    	$cart = Session::get('cart');
        $this->validate($req,[
            'name23131' => 'required',
            'email' => 'required|email',
            'address11223' => 'required',
            'phone' => 'required|min:11|numeric',
        ],
        [
            'name.required'=>'Vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',

            'address11223.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập số diện thoại',

            'phone.min'=>'Số diện thoại không đúng',
            'phone.numeric'=>'Vui lòng nhập số diện thoại'

        ]);
    	$customer = new Customer;
    	$customer->name = $req->name23131;
    	$customer->gender = $req->gender;
    	$customer->email = $req->email;
    	$customer->address = $req->address11223;
    	$customer->phone_number = $req->phone;
    	$customer->note = $req->notes;
    	$customer->save();

    	$bill = new Bill;
    	$bill->id_customer = $customer->id;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $cart->totalPrice;
    	$bill->payment = $req->payment_method;
    	$bill->note = $req->notes;
    	$bill->save();

    	foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
    	return redirect()->back()->with('thongbao','Đặt hàng thành công');
    	

    }


    public function postDangNhap(Request $req){
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:6|max:20'

    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',

    			'password.required'=>'Vui lòng nhập mật khẩu',
    			'password.min'=>'Mật khẩu ít nhất 6 ký tự',
    			'password.max'=>'Mật khẩu không quá 20 ký tự'
    		]);
    	
    	$credentials = array('email'=>$req->email, 'password'=>$req->password);
    	if(Auth::attempt($credentials) && Auth::user()->level == 2 ){
			return redirect()->back();
    	}
    	else
    	{
    		return redirect()->route('trang-chu-admin');

    	}
    	
    }

    public function getDangKy(){
    	return view('page.dangky');
    }

    public function postDangKy(Request $req){
    	$this->validate($req,
    		[
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required|min:6|max:20',
    			'fullname'=>'required',
    			're_password'=>'required|same:password'

    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',
    			'email.unique'=>'Email đã được sử dụng',

    			'password.required'=>'Vui lòng nhập mật khẩu',
    			'password.min'=>'Mật khẩu ít nhất 6 ký tự',
    			'password.max'=>'Mật khẩu không quá 20 ký tự',

    			're_password.required'=>'Vui lòng nhập lại mật khẩu',
    			're_password.same'=>'Mật khẩu không giống nhau'

    		]);
    	$user = new User();
    	$user->full_name = $req->fullname;
    	$user->email = $req->email;
    	$user->password = Hash::make($req->password);
		$user->phone = $req->phone;
		$user->address = $req->adress;
		$user->level = $req= 2;
		$user->save();
		return redirect()->route('trang-chu');  
    }

    public function postDangXuat(){
    	Auth::logout();
    	return redirect()->route('trang-chu');
    }

    public function getTimKiem(Request $req){
    	$product = Product::where('name','like','%'.$req->key.'%')
    								->orWhere('unit_price',$req->key)
    								->get();
		return view('page.timkiem',compact('product'));

    }

    public function getGioHangChiTiet(){
    	return view('page.chitiet_giohang');
    }

}

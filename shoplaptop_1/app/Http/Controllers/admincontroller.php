<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Auth;
use DB;
use Session;
use Hash;
use File;



class admincontroller extends Controller
{
    public function getIndexAdmin(){
    	if (Auth::check() && Auth::user()->level == 1) {
    		$loai = ProductType::all();
            $sp = Product::all();
            $nd = count(User::all());
            $dh = count(Bill::all());
    		return view('admin.Dashboard', compact('loai', 'sp', 'nd', 'dh'));
    	}
    	else
    		return redirect()->route('trang-chu');
    }

    public function getDash(){
        if (Auth::check() && Auth::user()->level == 1) {
            $loai = ProductType::all();
            $sp = Product::all();
            $nd = count(User::all());
            $dh = count(Bill::all());
            return view('admin.Dashboard', compact('loai', 'sp', 'nd', 'dh'));
        }
        else{
            return redirect()->route('trang-chu');
        }
        
    }

    public function getQL_NguoiDung(){
        if (Auth::check() && Auth::user()->level == 1) {
            $user = User::all();
            return view('admin.QL_nguoidung', compact('user'));
        }
        else{
            return redirect()->route('trang-chu');
        }
    	
    }

    public function getQL_Nsx(){
        if (Auth::check() && Auth::user()->level == 1) {
        	$nsx = ProductType::all();
        	return view('admin.QL_Nsx', compact('nsx'));
        }else{
            return redirect()->route('trang-chu');
        }
    }

    public function getQL_Sanpham(){
        if (Auth::check() && Auth::user()->level == 1) {

        	$sanpham = Product::orderby('id', 'desc')->get();
            $type = ProductType::all();
            //$sanpham1 = Product::join('type_products', 'type_products.id', '=', 'products.id_type')->orderby('products.id', 'desc')->get();
            $sanpham1 = DB::select("SELECT sp.id,sp.name,tp.name_type as loai,sp.description,sp.unit_price, sp.promotion_price,sp.image,sp.unit,sp.new
            FROM products as sp, type_products as tp
            WHERE sp.id_type=tp.id");

        	return view('admin.QL_sanpham', compact('sanpham','sanpham1', 'type'));

        }else{
            return redirect()->route('trang-chu');
        }
    }

    public function getQL_Slide(){
        if (Auth::check() && Auth::user()->level == 1) {
        	$slide = Slide::all();
        	return view('admin.QL_slide', compact('slide'));
        }else{
            return redirect()->route('trang-chu');
            
        }
    }
/*-----------------------------------------------User--------------------------------------------------------------------*/
    public function DelAdmin($id)
    {
        $user = User::where('id', $id)->delete();

        return redirect()->back()->with('thongbaodel', 'Delete Successful');
    }

    public function AddAdmin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'

            ],
            [
                'name.required'=>'Vui lòng nhập full name',

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
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->adress;
        $user->level = $req->level;
        $user->save();
        return redirect()->back()->with('thongbaoadd', 'Add New Successful'); 
    }


    public function getUpdateAdmin($id){
        if (Auth::check() && Auth::user()->level == 1) {
            $user_up=User::where('id',$id)->first();
            return view('admin.Update_user',compact('user_up'));
        }else{
            return redirect()->route('trang-chu');
        }
    }
    
    public function postUpdateAdmin(Request $req,$id){

        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'

        ],
        [
            'name.required'=>'Vui lòng nhập full name',

            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',

            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',

            're_password.required'=>'Vui lòng nhập lại mật khẩu',
            're_password.same'=>'Mật khẩu không giống nhau'

        ]);
        $user_up=User::where('id',$id)->first();
        $user_up->full_name = $req->name;
        $user_up->email = $req->email;
        $user_up->password = Hash::make($req->password);
        $user_up->phone = $req->phone;
        $user_up->address = $req->adress;
        $user_up->level = $req->level;

        $user_up->save();
        return redirect()->route('quanlynguoidung')->with('thongbaoupdate', 'Update Successful');
    }


/*-----------------------------------------------Slide-------------------------------------------------------------------*/
    

    public function DelAdmin_Slide($id)
    {
        $slide = Slide::where('id', $id)->first();

        $image_path = "source/image/slide/" . $slide->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $slide = Slide::where('id', $id)->first()->delete();


        return redirect()->back()->with('thongbaodel', 'Delete Successful');
    }

    public function AddAdmin_Slide(Request $req){
        $slide = new Slide();
        $this->validate($req,
        [
            'link_slide'=>'required',
            'image_file' => 'required|mimes:jpg,jpeg,png,gif|max:4096',

        ],
        [
            'link_slide.required'=>'Vui lòng nhập link',

            'image_file.required'=>'Vui lòng chọn hình',
            'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'image_file.max' => 'Hình ảnh giới hạn dung lượng không quá 4M',

        ]);

        $slide->link = $req->link_slide;

        if ($req->hasFile('image_file')) {
            $file = $req->file('image_file');
            $get_name_img = $file->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));  
            $new_img = $name_img.rand(0,99).'.'.$file->getClientOriginalExtension();
            $filename =time() .'.'. $new_img;
            $file->move('source/image/slide/', $filename);
            $slide->image = $filename;
        }else{
            return $req;
            $slide->image = '';
        }

        $slide->save();
        return redirect()->back()->with('thongbaoadd', 'Add New Successful');
    }

    public function getUpdateSlide($id){
        if (Auth::check() && Auth::user()->level == 1) {
            $slide_update = Slide::where('id',$id)->first();
            return view('admin.Update_slide',compact('slide_update'));
        }else{
            return redirect()->route('trang-chu');
        }
    }
    public function postUpdateSlide(Request $req, $id){
        if (Auth::check() && Auth::user()->level == 1) {
            $slide_update = Slide::where('id',$id)->first();
            $slide_update->link = $req->link_slide;

            if($req->hasFile('image')){
                $this->validate($req, 
                [
                    
                    'image' => 'required|mimes:jpg,jpeg,png,gif|max:4096',
                ],          
                [
                    
                    'image.required' => 'Vui lòng chọn hình',
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình ảnh giới hạn dung lượng không quá 4M',
                ]);

            }
            $getHT = Slide::select('image')->where('id',$req->id)->get();
            if($getHT[0]->image != '' && file_exists(public_path('source/image/slide/'.$getHT[0]->image)))
            {
                unlink(public_path('source/image/slide/'.$getHT[0]->image));
            }
            else if ($req->hasFile('image')) {
                $file = $req->file('image');
                $get_name_img = $file->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));  
                $new_img = $name_img.rand(0,99).'.'.$file->getClientOriginalExtension();
                $filename =time() .'.'. $new_img;
                $file->move('source/image/slide/', $filename);
                $slide_update->image = $filename;
            }else{
                return $req;
                $slide_update->image = '';
            }

            $slide_update->save();


            return redirect()->route('quanlyslide')->with('thongbaoupdate', 'Update Successful');
        }else{
            return redirect()->route('trang-chu');
        }
        
    }

/*-----------------------------------------------NSX--------------------------------------------------------------------*/
    public function DelAdmin_NSX($id, Request $req)
    {

        
        $image = ProductType::where('id', $id)->first();
        $sp1 = Product::where('id_type', $image->id)->delete();
       
        ProductType::where('id', $id)->first()->delete();
        return redirect()->back();
        

        return redirect()->back()->with('thongbaodel', 'Delete Successful');
    }

    public function AddAdmin_NSX(Request $req){
        $nsx = new ProductType();

        $this->validate($req,
        [
            'name'=>'required',

        ],
        [
            'name.required'=>'Vui lòng nhập tên',

        
        ]);

        $nsx->name_type  = $req->name;

        $nsx->save();
        return redirect()->route('quanlynsx')->with('thongbaoadd', 'Add New Successful'); 
    }

    public function getUpdateNsx($id){
        if (Auth::check() && Auth::user()->level == 1) {
            $nsx_update = ProductType::where('id',$id)->first();
            return view('admin.Update_nsx', compact('nsx_update'));
        }else{
            return redirect()->route('trang-chu');
        }
    }

    public function postUpdateNsx(Request $req, $id){
        $this->validate($req,
        [
            'name'=>'required',

        ],
        [
            'name.required'=>'Vui lòng nhập tên',

        ]);
         $nsx_update = ProductType::where('id',$id)->first();
        $nsx_update->name_type = $req->name;

        $nsx_update->save();

        return redirect()->route('quanlynsx')->with('thongbaoupdate', 'Update Successful'); 


    }


/*-----------------------------------------------Sản-Phẩm----------------------------------------------------------------*/
    
    public function DelAdmin_Sp($id, Request $req)
    {
        //$sp = Product::where('id', $id)->delete();;

        //return redirect()->back();
        // $getHT = Product::select('image')->where('id',$req->id)->get();
        // if($getHT[0]->image != '' && file_exists(public_path('source/image/product/'.$getHT[0]->image)))
        // {
        //     unlink(public_path('source/image/product/'.$getHT[0]->image));
        // }
        $sp1 = Product::where('id', $id)->first();

        $image_path = "source/image/product/" . $sp1->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $sp1 = Product::where('id', $id)->first()->delete();

        return redirect()->back()->with('thongbaodel', 'Delete Successful');
    }

    public function AddAdmin_Sp(Request $req){
        $sp = new Product();

        $this->validate($req,
        [
            'name'=>'required',
            'unit_price'=>'required',
            'promotion_price'=>'required',
            'image_file' => 'required|mimes:jpg,jpeg,png,gif|max:4096',

        ],
        [
            'name.required'=>'Vui lòng nhập tên',

            'unit_price.required'=>'Vui lòng nhập số tiền',

            'promotion_price.required'=>'Vui lòng nhập số tiền khuyến mãi',

            'image_file.required' => 'Vui lòng chọn hình',
            'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'image_file.max' => 'Hình ảnh giới hạn dung lượng không quá 4M',

        
        ]);


        $sp->name = $req->name;
        $sp->description = $req->description;
        $sp->unit_price = $req->unit_price;
        $sp->promotion_price = $req->promotion_price;
        $sp->new = $req->new;
        $sp->id_type  = $req->type;

        if ($req->hasFile('image_file')) {

            $file = $req->file('image_file');
            $get_name_img = $file->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));  
            $new_img = $name_img.rand(0,99).'.'.$file->getClientOriginalExtension();
            $filename =time() .'.'. $new_img;
            $file->move('source/image/product/', $filename);
            $sp->image = $filename;
        }else{
            return $req;
            $sp->image = '';
        }

        $sp->save();
        return redirect()->back()->with('thongbaoadd', 'Add New Successful');
    }

    public function getUpdateSp($id){
        if (Auth::check() && Auth::user()->level == 1) {
            $sp_update = Product::where('id',$id)->first();
            $type = ProductType::orderby('id', 'desc')->get();
            return view('admin.Update_sp', compact('type', 'sp_update'));
        }else{
            return redirect()->route('trang-chu');
        }
    }

    public function postUpdateSp(Request $req, $id){
        if (Auth::check()) {
            $sp_update = Product::where('id',$id)->first();

            $this->validate($req,
            [
                'name'=>'required',
                'unit_price'=>'required',
                'promotion_price'=>'required',
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:4096',

            ],
            [
                'name.required'=>'Vui lòng nhập tên',

                'unit_price.required'=>'Vui lòng nhập số tiền',

                'promotion_price.required'=>'Vui lòng nhập số tiền khuyến mãi',

                'image.required' => 'Vui lòng chọn hình',
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình ảnh giới hạn dung lượng không quá 4M',

            
            ]);
            $sp_update->name = $req->name;
            $sp_update->description = $req->description;
            $sp_update->unit_price = $req->unit_price;
            $sp_update->promotion_price = $req->promotion_price;
            $sp_update->new = $req->new;
            $sp_update->id_type  = $req->type;

            $getHT = Product::select('image')->where('id',$req->id)->get();
            if($getHT[0]->image != '' && file_exists(public_path('source/image/product/'.$getHT[0]->image)))
            {
                unlink(public_path('source/image/product/'.$getHT[0]->image));
            }
            else if ($req->hasFile('image')) {

                $file = $req->file('image');
                $get_name_img = $file->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));  
                $new_img = $name_img.rand(0,99).'.'.$file->getClientOriginalExtension();
                $filename =time() .'.'. $new_img;
                $file->move('source/image/product/', $filename);
                $sp_update->image = $filename;
            }else{
                return $req;
                $sp_update->image = '';
            }

            $sp_update->save();
            return redirect()->route('quanlysanpham')->with('thongbaoupdate', 'Update Successful');
        }else {
            return redirect()->route('trang-chu');
        }
    }


/*-----------------------------------------------Đơn-Hàng----------------------------------------------------------------*/
    
    public function getDonHang()
    {
        if (Auth::check()) {
            
            $donhang = Bill::join('customer', 'customer.id', '=', 'bills.id_customer')->get();
           

            // $donhang = DB::select("SELECT b.id as id_user,ct.name,
            //     ct.gender,ct.email,ct.address,ct.phone_number,ct.note,b.id as id_bill,
            //     b.date_order,b.total,b.payment
            //     FROM customer as ct,bills as b,products as p
            //     WHERE ct.id = b.id_customer");

            return view('admin.QL_donhang', compact('donhang'));


        } else {
            return redirect()->route('trang-chu');
        }
    }

    public function DelAdmin_DonHang($id)
    {

        $bill = Bill::where('id_bill', $id)->first();

        Customer::where('id', $bill->id_customer)->first()->delete();

        $billdetail = BillDetail::where('id_bill', $bill->id_bill)->delete();

        
        Bill::where('id_bill',$id)->delete();

        return redirect()->back()->with('thongbaodel', 'Delete Successful');
    }

    public function getChiTietDonHang($id)
    {
        if (Auth::check()) {

            // $billdetaill = BillDetail::join('bills', 'bills.id_bill', '=', 'bill_detail.id_bill')
            //     ->join('products', 'products.id', '=', 'bill_detail.id_product')->get();

            $billdetaill =DB::select("SELECT bt.id_bill_detail, bt.id_bill, bt.id_product, bt.quantity,
        bt.unit_price,p.name,p.image
        FROM bill_detail bt, products p
         WHERE bt.id_product=p.id AND id_bill=$id ");
            return view('admin.ChitietDH', compact('billdetaill'));
        } else {
            return redirect()->route('trang-chu');
        }
    }

}

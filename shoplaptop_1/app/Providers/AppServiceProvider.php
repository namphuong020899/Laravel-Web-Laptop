<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master',function($view){
            $loai_sanpham = ProductType::all();

            
            $view->with('loai_sanpham',$loai_sanpham);

        });
        view()->composer('master',function($view){
            if(Session('cart')){
                $oldtCart = Session::get('cart');
                $cart = new Cart($oldtCart);
                $view->with([ 'cart'=>Session::get('cart'), 'product_cart'=>
                $cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer(['master','page.dathang'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

        
    }
}

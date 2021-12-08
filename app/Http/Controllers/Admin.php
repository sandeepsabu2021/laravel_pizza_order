<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class Admin extends Controller
{
    public function home()
    {
        return view('pizza.pages.home');
    }

    public function register()
    {
        return view('pizza.pages.register');
    }

    public function regvalid(Request $req)
    {
        $validateReg = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'mail' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'add' => 'required|regex:/^[a-zA-Z,-. ]{5,500}$/',
            'mob' => 'required|regex:/^[6-9][0-9]{9}+$/',
            'city' => 'required',
            'pass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'conpass' => 'required_with:pass|same:pass'
        ], [
            'name.required' => "Enter name",
            'name.regex' => "Alphabets only | 2-100 characters",

            'add.required' => "Enter address",
            'add.regex' => "Alphanumeric only | 5-500 characters | .,- allowed",

            'mail.required' => "Enter email",
            'mail.regex' => "Enter valid format (example: abc@pqr.xyz)",

            'mob.required' => "Enter mobile",
            'mob.regex' => "Numeric only | 10 digits",

            'city.required' => "Select city",

            'pass.required' => "Enter password",
            'pass.regex' => "Minimum 8 characters | at least one uppercase letter, one lowercase letter and one number",

            'conpass.required_with' => "Re-enter password",
            'conpass.same' => "Password doesn't match",

        ]);
        if ($validateReg) {

            $reg = new Customer();
            $reg->name = $req->name;
            $reg->email = $req->mail;
            $reg->mobile = $req->mob;
            $reg->address = $req->add;
            $reg->city = $req->city;
            $reg->password = Hash::make($req->pass);
            if ($reg->save()) {
                // return back()->with('Success', $req->name . ' registered successfully!');
                return Redirect::to('/login');
            } else {
                return back()->with('Error', 'Error registering customer');
            }
        }
    }

    public function login()
    {
        return view('pizza.pages.login');
    }

    public function logvalid(Request $req)
    {
        $validateLogin = $req->validate([
            'mail' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'pass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
        ], [
            'mail.required' => "Enter email",
            'mail.regex' => "Enter valid format (example: abc@pqr.xyz)",

            'pass.required' => "Enter password",
            'pass.regex' => "Minimum eight characters | at least one uppercase letter, one lowercase letter and one number",
        ]);
        if ($validateLogin) {
            $mail = $req->mail;
            $pass = $req->pass;
            $log = Customer::where('email', '=', $mail)->first();
            if (!$log) {
                return back()->with('Error', "User doesn't exist");
            } else {
                if (Hash::check($pass, $log->password)) {
                    $req->session()->put('user', $log);
                    return Redirect::to('/home');
                } else {
                    return back()->with('Error', 'Incorrect password');
                }
            }
        }
    }

    public function menu()
    {
        $menu = Menu::all();
        return view('pizza.pages.menu', ['menu' => $menu]);
    }

    public function cart()
    {
        $menu = Menu::all();
        return view('pizza.pages.cart', ['menu' => $menu]);
    }

    public function editprofile()
    {
        $user = session('user');
        $id = $user->id;
        $u = Customer::where('id', '=', $id)->first();
        return view('pizza.pages.editprofile', ['u' => $u]);
    }

    public function changepass()
    {

        return view('pizza.pages.changepass');
    }

    public function updatevalid(Request $req)
    {
        $validateUpdate = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'mail' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'add' => 'required|regex:/^[a-zA-Z,-. ]{5,500}$/',
            'mob' => 'required|regex:/^[6-9][0-9]{9}+$/',
            'city' => 'required',
            'uid' => 'required',
        ], [
            'name.required' => "Enter name",
            'name.regex' => "Alphabets only | 2-100 characters",

            'add.required' => "Enter address",
            'add.regex' => "Alphanumeric only | 5-500 characters | .,- allowed",

            'mail.required' => "Enter email",
            'mail.regex' => "Enter valid format (example: abc@pqr.xyz)",

            'mob.required' => "Enter mobile",
            'mob.regex' => "Numeric only | 10 digits",

            'city.required' => "Select city",


        ]);
        if ($validateUpdate) {

            $update = Customer::where('id', '=', $req->uid)->first();
            $update->name = $req->name;
            $update->email = $req->mail;
            $update->mobile = $req->mob;
            $update->address = $req->add;
            $update->city = $req->city;

            if ($update->save()) {
                return Redirect::to('/home')->with('Success', 'Details updated successfully!');
            } else {
                return back()->with('Error', 'Error registering customer');
            }
        }
    }

    public function passvalid(Request $req)
    {

        $validatePass = $req->validate([
            'oldpass' => 'required',
            'pass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'conpass' => 'required_with:pass|same:pass'
        ], [
            'oldpass.required' => "Enter password",
            'oldpass.regex' => "Minimum eight characters, at least one uppercase letter, one lowercase letter and one number",

            'pass.required' => "Enter password",
            'pass.regex' => "Minimum eight characters, at least one uppercase letter, one lowercase letter and one number",

            'conpass.required_with' => "Re-enter password",
            'conpass.same' => "Password doesn't match",

        ]);
        if ($validatePass) {

            $id = session('user')->id;
            $userdets = Customer::where('id', '=', $id)->first();
            $pass = $req->oldpass;

            if (Hash::check($pass, $userdets->password)) {
                $userdets->password = Hash::make($req->pass);
                $userdets->save();
                return Redirect::to('/home')->with('Success', 'Password changed successfully!');
            } else {
                return back()->with('Error', 'Incorrect current password');
            }
        }
    }



    public function order()
    {
        $menu = Menu::all();
        $user = session('user');
        $id = $user->id;
        $ord = Order::where('c_id', '=', $id)->get();
        return view('pizza.pages.order', ['menu' => $menu, 'ord' => $ord]);
    }

    public function addcart(Request $req)
    {
        $cart = $req->cart;
        $cart = str_split($cart, 1);
        $cart = array_unique($cart);
        $cartlen = count($cart);
        $req->session()->put('cart_val', $cartlen);
        $req->session()->put('cart', $cart);
        return "Item added";
    }

    public function delcart(Request $req)
    {
        $id = $req->id;
        $cart = session('cart');
        if (($key = array_search($id, $cart)) !== false) {
            unset($cart[$key]);
        }
        $cartlen = count($cart);
        $req->session()->put('cart_val', $cartlen);
        $req->session()->put('cart', $cart);
        return "working $cartlen";
    }

    public function payment($amt)
    {
        $menu = Menu::all();
        return view('pizza.pages.payment', ['menu' => $menu, 'amt' => $amt]);
    }

    public function mail()
    {
        return view('pizza.pages.mail');
        
    }

    public function payvalid(Request $req)
    {
        $validatePay = $req->validate([
            'uid' => 'required',
            'card' => 'required|regex:/^[1-9][0-9]{13,16}+$/',
            'total' => 'required',

        ], [
            'card.required' => "Enter credit card number",
            'card.regex' => "Numeric only | 13-16 characters",

        ]);
        if ($validatePay) {

            $cart = session('cart');
            $pid = implode("", $cart);

            $ord = new Order();
            $ord->c_id = $req->uid;
            $ord->p_ids = $pid;
            $ord->total = $req->total;
            $ord->card_number = $req->card;
            if ($ord->save()) {
                $email = session('user')->email;
                $menu = Menu::all();
                $data = ['card'=>$req->card,'menu'=>$menu, 'total'=>$req->total];
                $mail['to'] = $email;
                Mail::send('pizza.pages.mail', $data, function($message) use($mail){
                    $message->to($mail['to']);
                    $message->subject('Pizza Bay - Order Details');
                });
                session()->forget('cart');
                session()->forget('cart_val');

                // return back()->with('Success', 'Thankyou! Order placed successfully!');
                return Redirect::to('/home')->with('Success', 'Thankyou, order placed successfully! Check registered email!');
            } else {
                return Redirect::to('/home')->with('Error', 'Error placing order');
            }
        }
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('cart_val');
        session()->forget('cart');
        return Redirect::to('/login');
    }
}

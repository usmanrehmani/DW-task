<?php

namespace App\Http\Controllers;

use App\Mail\ActivationMail;
use App\Mail\DemoMail;
use App\Models\Company as ModelsCompany;
use App\Models\User;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{

    public function LoginForm()
    {
        return view('welcome');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:50',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->code = Str::random(30);
        $user->status = 0;
        $user->save();
        Mail::to($request->email)->send(new DemoMail($user));
        return redirect()->back()->with('message', 'Registered Successfully Please verify your email');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $confirm = Auth::user();
            if ($confirm->status == 1) {
                return redirect()->route('dashboard')->with('message', 'Login Successfully');
            } else {
                return redirect()->route('login')->with('message', 'Email is Not Verified');
            }
        } else {
            return redirect()->route('login')->with('message', 'Credentials Does not match');
        }
    }

    public function verify($code)
    {
        $verify = User::where('code', $code)->first();
        $verify->status = 1;
        $verify->update();
        return Redirect::to('/')->with('message', 'Email verified successfully');
    }
    public function signOut()
    {
        Auth::logout();
        return Redirect::to('/')->with('message', 'Logout Successfully');
    }

    public function dashboard()
    {
        $data = DB::table('companies')->get();
        $cro = ModelsCompany::all();
        return view('dashboard', compact('data','cro'));
    }

    public function companyByDate(Request $request)
    {
        $request->validate([
            'date'  => 'required',
            'todate'  => 'required'
        ]);
        $from = date($request->date);
        $to = date($request->todate);
        $data = ModelsCompany::whereBetween(DB::raw('date(reg_date)'), [$from, $to])->get();
        $cro = ModelsCompany::all();
        return view('dashboard', compact('data','cro'));
    }

    public function companyByStatus(Request $request)
    {
        $request->validate([
            'status'  => 'required',
        ]);

        $data = ModelsCompany::where('status', $request->status)->get();
        $cro = ModelsCompany::all();
        return view('dashboard', compact('data','cro'));
    }

    public function companyByCro(Request $request)
    {
        $request->validate([
            'cro'  => 'required',
        ]);

        $data = ModelsCompany::where('cro', $request->cro)->get();
        $cro = ModelsCompany::all();
        return view('dashboard', compact('data','cro'));
    }
}

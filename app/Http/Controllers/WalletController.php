<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index() {
        $wallets = Wallet::all();
        return view('admin.wallet.index', compact('wallets'));
    }

    public function recharge($id) {
        return view('admin.wallet.recharge', compact('id'));
    }

    public function rechargeUser(Request $request, $id) {
        $request->validate([
            'amount' => 'required|integer|min:20',
        ]);

        $wallet = Wallet::find($id);
        $wallet->balance += $request['amount'];
        $wallet->save();
        return redirect('/admin-wallet')->with('success', 'تم شحن المحفظة بنجاح');
    }

    public function userWallet() {
        $balance = Wallet::where('user_id', Auth::user()->id)->first()->balance;
        return view('user.wallet.index', compact('balance'));
    }
}

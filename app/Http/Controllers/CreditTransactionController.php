<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCreditRequest;
use App\Models\CreditTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CreditTransactionController extends Controller
{
    public function index()
    {
    	$creditTransactions = CreditTransaction::with(relations:'user')->orderBy('id', 'DESC')->paginate(30);

    	return Inertia::render('creditTransactions/Index', compact('creditTransactions'));
    }

    public function create()
    {
        $users = User::where('status_id',1)->get();
    	return Inertia::render('creditTransactions/Create', compact('users'));
    }

    public function store(CreateCreditRequest $request)
    {
    	CreditTransaction::create([
            'user_id' => $request->user_id,
            'amount'  => $request->amount,
            'balance' => $request->amount
    	]);


        $user = User::find($request->user_id);
        $sumAmount = $user->amount + $request->amount;
        $user->update(['amount' => $sumAmount]);

        return Redirect::route('creditTransactions.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCreditRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CreditTransactionController extends Controller
{
    public function index()
    {
    	$transactions = Transaction::with('user', 'create_by')->orderBy('id', 'DESC')->paginate(30);

    	return Inertia::render('Transactions/Index', compact('transactions'));
    }

    public function create()
    {
        $users = User::where('status_id',1)->get();
    	return Inertia::render('Transactions/Create', compact('users'));
    }

    public function store(CreateCreditRequest $request)
    {
        DB::transaction(function () use ($request) 
        {
            $typeTransaction = 'Credito';
            $user = User::find($request->user_id);
            $finalAmount = $request->amount;
            $observation = $request->observation;
            
            if($request->balance_adjust == true) 
            {
                if($request->amount > $user->amount)
                {
                    $finalAmount -= $user->amount;
                }
                else
                {
                    $finalAmount = $user->amount - $finalAmount;
                    $typeTransaction = 'Debito';
                }

                $observation = 'Ajuste de saldo ' . $request->observation;
            }
            else $finalAmount = $user->amount + $request->amount;

            Transaction::create([
                'type'    => $typeTransaction,
                'user_id' => $request->user_id,
                'before'  => $user->amount,
                'amount'  => $request->amount,
                'after' => $finalAmount,
                'observation' => $observation,
                'createdBy' => auth()->user()->id
            ]);
    
            $user->update(['amount' => $finalAmount]);
        });

        return Redirect::route('Transactions.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }
}

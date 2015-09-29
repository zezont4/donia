<?php namespace App\Http\Controllers;

use App\Client;
use App\Commands\SendSmsToClientCommand;
use App\Contract;
use App\Http\Requests\ContractRequest;
use App\Technical;


class ContractController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
//        $this->middleware('acl');
	}


	/**
	 * index
	 */
	public function index()
	{
		$contracts = Contract::latest('updated_at')->latest('created_at')->with('client')->paginate(5);

		return View('contract.index', compact('contracts'));
	}


	/**
	 * store
	 */
	public function store(Client $client, ContractRequest $request)
	{
		$client->contracts()->create($request->all());

		return redirect()->route('contract.index');
	}


	/**
	 * show
	 */
	public function show(Contract $contract)
	{
		return View('contract.show', compact('contract'));
	}

	public function show1(Contract $contract)
	{
		return View('contract.show1', compact('contract'));
	}


	/**
	 * edit
	 */
	public function edit(Contract $contract)
	{

		$tech_list = Technical::whereIsHidden(0)->lists('name', 'id')->all();

		return View('contract.edit', compact('contract', 'tech_list'));
	}

	/**
	 * update
	 */
	public function update(Contract $contract, ContractRequest $request)
	{

		if ($contract->update($request->all())) {
			if ($request->send_sms) {
				$this->dispatch(new SendSmsToClientCommand($contract->id, $request->is_repaired));
			}
		}

		return redirect()->route('contract.index');
	}


	/**
	 * newTicket
	 */
	public function newTicket($client_id)
	{
		$tech_list = Technical::whereIsHidden(0)->lists('name', 'id')->all();
		return View('contract.newTicket', compact('client_id', 'tech_list'));
	}
}
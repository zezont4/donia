<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Bugsnag;

class ClientController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
//        $this->middleware('acl');
	}

	public function search()
	{
		return View('client/search');
	}

	public function index(Client $client)
	{
		// DB::row is used to fix order by full_name
		$clients = $client->search()->sort()->select('*', \DB::raw('CONCAT_WS(" ", name1, name2, name3, name4) AS full_name'))->paginate();

		$trashedClients = $client->search()->onlyTrashed()->latest()->get();

		return View('client.index', compact('clients', 'trashedClients'));
	}

	public function create()
	{
		return View('client.create');
	}

	public function store(ClientRequest $request)
	{
		$client = Client::create($request->all());

		return redirect()->route('contract.newTicket', ['client_id' => $client->id]);
	}

	public function show(Client $client)
	{
		return View('client.show', compact('client'));
	}

	public function edit(Client $client)
	{
		return View('client.edit', compact('client'));
	}

	public function update(Client $client, ClientRequest $request)
	{
		$client->update($request->all());

		return redirect()->back();
	}

	public function destroy(Client $client)
	{
		$client->delete();

		return redirect()->back();
	}

	public function restore(Client $client)
	{
		$client->restore();

		return redirect()->back();
	}
}
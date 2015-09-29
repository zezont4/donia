<?php

namespace App\Http\Controllers;

use App\Technical;
use App\Http\Requests\TechnicalRequest;
//use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller;

class TechnicalController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		//$this->middleware('acl');
	}

	/**
	 * show search form
	 */
	public function search()
	{
		return View('technical.search');
	}

	/**
	 * show search results
	 */
	public function searchResult(Technical $technical,$orderBy = null)
	{
		$searchableFields = ["name","is_hidden"];

		// DB::row is used to fix order by full_name
		//$technicals = $technical->WithSearchFilter($searchableFields)->select('*', \DB::raw('CONCAT_WS(" ", name1, name2, name3, name4) AS full_name'));
		$technicals = $technical->WithSearchFilter($searchableFields);

		$trashedTechnicals = $technical->WithSearchFilter($searchableFields)->onlyTrashed();

		$orderBy ? $technicals->oldest($orderBy) :$technicals->latest();

		$technicals = $technicals->paginate();

		$trashedTechnicals = $trashedTechnicals->latest()->get();

		return View('technical.searchResult', compact('technicals', 'trashedTechnicals'));
	}

	/**
	 * show create form
	 */
	public function create()
	{
		return View('technical.create');
	}

	/**
	 * store new technical to the database
	 */
	public function store(TechnicalRequest $request)
	{
		$technical = Technical::create($request->all());

		return redirect()->route('technical.show', ['technical_id'=> $technical->id]);
	}

	/**
	 * show technical details
	 */
	public function show(Technical $technical)
	{
		return View('technical.show', compact('technical'));
	}

	/**
	 * show edit form
	 */
	public function edit(Technical $technical)
	{
		return View('technical.edit', compact('technical'));
	}


	/**
	 * save changes to database
	 */
	public function update(Technical $technical, TechnicalRequest $request)
	{
		$technical->update($request->all());

		return redirect()->back();
	}

	/**
	 * delete
	 */
	public function destroy(Technical $technical)
	{
		$technical->delete();

		return redirect()->back();
	}

	/**
	 * delete
	 */
	public function restore(Technical $technical)
	{
		$technical->restore();

		return redirect()->back();
	}

}

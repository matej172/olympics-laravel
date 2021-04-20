<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function edit(Person $person) {
	return view('people.edit')->with(['person' => $person]);
    }

    public function delete(Person $person) {
	$person->delete();
	return redirect()->route('dashboard')->with(['success' => 'Person deleted']);
    }

    public function update(Request $request, Person $person) {
	$request->validate([
            'firstname' => 'required',
        ]);
	$person->update($request->all());

	return redirect()->route('dashboard')->with(['success' => 'Person updated']);
    }
}

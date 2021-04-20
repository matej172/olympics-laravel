<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
		    <h1>Olympionici</h1>
			@if (session('success'))
			<div class="w-full bg-green-300 border border-green-600 rounded-lg p-4 my-2 shadow-xl">{{session('success')}}</div>
			@endif
			<div class="bg-white shadow-md rounded my-6">
			    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
			      <thead>
				<tr>
				  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
				  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">City</th>
				  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
				</tr>
			      </thead>
			      <tbody>
				    @foreach(\App\Models\Person::all() as $person)
				<tr class="hover:bg-grey-lighter">
				  <td class="py-4 px-6 border-b border-grey-light">{{ $person->firstname . ' ' . $person->lastname }}</td>
				  <td class="py-4 px-6 border-b border-grey-light">{{ $person->birth_place }}</td>
				  <td class="py-4 px-6 border-b border-grey-light">
				    <a href="{{ route('people.edit', $person->id) }}" class="text-gray-50 font-bold py-1 px-3 rounded text-xs transition-colors duration-1000 bg-green-600 hover:bg-green-800">Edit</a>
				    <a href="{{route('people.show', $person->id)}}" class="text-gray-50 font-bold py-1 px-3 rounded text-xs bg-blue-600 hover:bg-blue-800">View</a>
				    <form class="inline-block" method="POST" action="{{route('person.delete', $person->id)}}">
					@csrf
					@method('DELETE')
					<input class="text-gray-50 cursor-pointer font-bold py-1 px-3 rounded text-xs bg-red-600 hover:bg-red-800" type="submit" value="Delete">
				    </form>
				  </td>
				</tr>
				    @endforeach
			      </tbody>
			    </table>
		      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

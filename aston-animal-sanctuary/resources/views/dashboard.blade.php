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
                  You're logged in!
              </div>
          </div>
      </div>
  </div>

  <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="table table-bordered">
              <tr>
                  <th width="80px">@sortablelink('id', 'ID')</th>
                  <th>@sortablelink('name')</th>
                  <th>@sortablelink('species')</th>
                  <th>@sortablelink('colour')</th>
                  <th>@sortablelink('created_at', 'Date added')</th>
              </tr>
              @if($animals->count())
                  @foreach($animals as $key => $animal)
                      <tr>
                          <td>{{ $animal->id }}</td>
                          <td>{{ $animal->name }}</td>
                          <td>{{ $animal->species }}</td>
                          <td>{{ $animal->colour }}</td>
                          <td>{{ $animal->created_at }}</td>
                      </tr>
                  @endforeach
              
              @endif
          </table>
            {{-- {{ $animals->links() }} --}}

{{-- <p> 
  Displaying {{$animals->count()}} of {{ $animals->total() }} animal(s).
</p> --}}
          </div>
        </div>
      </div>
    </div>
</x-app-layout>

@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div data-theme="dracula">
        <div class="p-4">
            <table class="table table-auto w-full p-2">
                <thead>
                <tr class="border-b-2 text-center">
                    @foreach($fields as $field)
                        <th data-theme="dracula">
                            <p class="text text-lg">@lang('fields.'.$field['name'])</p>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <thead>
                <form method="GET" id="searchForm" action="{{ route('customers.index') }}">

                    <tr data-theme="dracula" class="border-b-2">
                        @foreach($fields as $field)
                            <th class="p-2">
                                <input
                                        type="text"
                                        {{!$field['searchable'] ? 'disabled' : ''}}
                                        id="{{$field['name']}}"
                                        class="input input-outline w-full form-control border border-gray-300 p-2"
                                        style="height:28px"
                                        value="{{$searchParams[$field['name']] ?? ''}}"
                                        name="search[{{$field['name']}}]"
                                        onchange="searchTable()"
                                />
                            </th>
                        @endforeach
                    </tr>
                </form>

                </thead>
                <tbody data-theme="dracula">
                @foreach($customers as $customer)
                    <tr class="border-b-2 text-center" style="height:80px">
                        <td class="align-middle">
                            <p class="text-lg">
                                {{$customer->name}}
                            </p>
                        </td>
                        <td class="align-middle">
                            <p class="text-lg">
                                {{$customer->email}}
                            </p>
                        </td>
                        <td class="align-middle">
                            <p class="text-lg">
                                {{$customer->birthDate}}
                            </p>
                        </td>
                        <td class="align-middle">
                            <p class="text-lg">
                                {{$customer->document}}
                            </p>
                        </td>
                        <td class="align-middle" >
                            <a class="badge badge-lg badge-neutral" href="{{route('customers.edit',$customer)}}">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $customers->links() }}
            </div>

        </div>
@endsection
@section('scripts')
        <script>
            function searchTable(){
                document.querySelector('#searchForm').submit()
            }
        </script>
@endsection

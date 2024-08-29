@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div data-theme="dracula" class="">
        <div class="p-4 bg-white">

            <table class="table table-auto w-full bg-white p-2">
                <thead>
                <tr class="border-b-2 text-center">
                    @foreach($fields as $field)
                        <th>
                            <p class="text-black text-lg">@lang('fields.'.$field['name'])</p>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <thead>
                <form method="GET" id="searchForm" action="{{ route('customers.index') }}">

                    <tr class="border-b-2">
                        @foreach($fields as $field)
                            <th class="p-2">
                                <input
                                        type="text"
                                        {{!$field['searchable'] ? 'disabled' : ''}}
                                        id="{{$field['name']}}"
                                        class="w-full form-control border border-gray-300 p-2"
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
                <tbody>
                @foreach($customers as $customer)
                    <tr class="border-b-2 text-center" style="height:80px">
                        <td>
                            <p class="text-lg">
                                {{$customer->name}}
                            </p>
                        </td>
                        <td>
                            <p class="text-lg">
                                {{$customer->email}}
                            </p>
                        </td>
                        <td>
                            <p class="text-lg">
                                {{$customer->birthDate}}
                            </p>
                        </td>
                        <td>
                            <p class="text-lg">
                                {{$customer->document}}
                            </p>
                        </td>
                        <td>
                            <a href="{{route('customers.edit',$customer)}}">Ver</a>
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

@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="">
        <div class="p-4 bg-white">

            <table class="table-auto m-auto bg-white p-2">
                <thead>
                <tr class="border-b-2 text-center">
                    @foreach(["Nome","Email","Data de Nascimento","Documento", "Ações"] as $costumer)
                        <th>
                            <a
                                    href=""
                            >
                                {{$costumer}}
                            </a>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <thead>
                <tr class="border-b-2">
                    @foreach(["Nome","Email","Data de Nascimento","Documento", "Ações"] as $costumer)
                        <th class="p-2">
                            <input
                                    type="text"
                                    id="{{$costumer}}"
                                    class="w-full form-control border border-gray-300 p-2"
                                    style="height:28px"
                                    value=""
                                    onchange=""
                            />
                        </th>
                    @endforeach
                </tr>
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
        </div>
@endsection

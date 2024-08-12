@extends('layouts.app')

@section('title', $customer->id ? "Editar Cliente" : "Cadastrar Cliente")

@section('content')

    <!-- Update Form -->
    <form action="{{ route('customers.update') }}" method="POST" class="border-color-black border-solid" id="form">
        @csrf
        <div class="flex flex-column flex-wrap justify-items-center align-items-center">

            <div class="p-4 w-1/2 row flex flex-wrap items-center justify-between">
                <h1>{{$customer->id != null ? "Editar cliente - " . $customer->id : "Cadastrar novo cliente"}}</h1>
            </div>
            <div class="p-2 w-1/2 row flex flex-wrap items-center justify-between">
                <input type="hidden" id="id" name="id" value="{{ old('id', $customer->id) }}">
                <div class="w-1/2 p-3">
                    <label for="name">Name:</label>
                    <input class="w-full form-control border border-black" type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                    <br><br>
                </div>
                <div class="w-1/2 p-3">
                    <label for="document">Document:</label>
                    <input class="w-full form-control border border-black" type="text" id="document" name="document" value="{{ old('document', $customer->document) }}" required>
                    <br><br>
                </div>
                <div class="w-1/2 p-3">
                    <label for="birthDate">Birth Date:</label>
                    <input class="w-full form-control border border-black" type="date" id="birthDate" name="birthDate" value="{{ old('birthDate', \Carbon\Carbon::createFromFormat('d/m/Y',$customer->birthDate)->format('Y-m-d')) }}" required>
                    <br><br>
                </div>
                <div class="w-1/2 p-3">
                    <label for="email">Email:</label>
                    <input class="w-full form-control border border-black" type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
                    <br><br>
                </div>
                <div class="flex justify-between w-full pt-4">
                    <button class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 border-b-4 border-sky-700 hover:border-sky-500 rounded" type="submit">
                        {{$customer->id != null ? "Atualizar" : "Criar" }}
                    </button>
                    @if($customer->id != null)
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="button" onclick="confirmDelete()">
                            Deletar
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </form>
    <!-- Delete Form -->
    @if($customer->id != null)
    <form action="{{ route('customers.destroy', $customer) }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
    @endif
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            if (confirm('Tem certeza de que deseja deletar este cliente?')) {
                document.querySelector('#delete-form').submit();
            }
        }
    </script>
@endsection

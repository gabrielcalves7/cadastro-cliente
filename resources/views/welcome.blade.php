@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container mx-auto p-6 text-center">
        <h1 class="text-3xl font-bold mb-4">Menu de Cadastro de Clientes</h1>
        <div class="flex flex-col justify-items-center justify-content-center">
            <div class="grid grid-cols-1 gap-6">
                <a href="{{ route('customers.create') }}" class="p-6 bg-white border rounded-lg shadow-md hover:bg-gray-100">
                    <h2 class="text-xl font-semibold mb-2">Cadastrar Novo Cliente</h2>
                </a>
                <a href="{{ route('customers.index') }}" class="p-6 bg-white border rounded-lg shadow-md hover:bg-gray-100">
                    <h2 class="text-xl font-semibold mb-2">Listar Clientes</h2>
                </a>
                <!-- Adicione mais opções aqui se necessário -->
            </div>
        </div>
    </div>
@endsection

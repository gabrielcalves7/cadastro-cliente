@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container mx-auto p-6 w-1/2 text-center">
        <h1 class="text-3xl font-bold mb-4">Menu de Cadastro de Clientes</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('customers.create') }}" class="p-6 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Cadastrar Novo Cliente</h2>
            </a>
            <a href="{{ route('customers.index') }}" class="p-6 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Listar Clientes</h2>
            </a>
            <!-- Adicione mais opções aqui se necessário -->
        </div>
    </div>
@endsection

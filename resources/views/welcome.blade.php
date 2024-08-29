@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div data-theme="dracula" class="container mx-auto p-6 text-center">
        <h1 class="h1 text-3xl font-bold mb-4">Menu de Cadastro de Clientes</h1>
        <div class="flex flex-col justify-items-center justify-content-center">
            <div class="grid grid-cols-1 gap-6">
                <a href="{{ route('customers.create') }}" class="btn btn-neutral">
                    <h2 class="text-xl font-semibold mb-2">Cadastrar Novo Cliente</h2>
                </a>
                <a href="{{ route('customers.index') }}" class=" btn btn-neutral">
                    <h2 class="text-xl font-semibold mb-2">Listar Clientes</h2>
                </a>
                <!-- Adicione mais opções aqui se necessário -->
            </div>
        </div>
    </div>
@endsection

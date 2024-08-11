<!-- resources/views/components/header.blade.php -->

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-center">
            <p class="bg-green w-full">Gerenciador de Cadastro de Clientes</p>
        </div>
    </nav>
</header>
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <header id="main-header" class="bg-sky-400 p-5">
        <ul class="grid grid-flow-col auto-cols-max gap-4">
            <li>
                <a href="{{route('customers.index')}}">
                    Ver Clientes
                </a>
            </li>
        </ul>
    </header>
</div>
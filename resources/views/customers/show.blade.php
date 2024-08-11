@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<h1>Editar Cliente</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@elseif (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

{{--    {!! Form::open([--}}
{{--        'method'=> "POST",--}}
{{--        'class'=> "border-1 border-2 border-color-black border-solid p-3",--}}
{{--        'url'=> url(route('customers.update')),--}}
{{--        'enctype'=>'multipart/form-data'--}}
{{--      ])--}}
{{--   !!}--}}
    <form action="{{ route('customers.update') }}"
          method="POST"
          class="border-2 border-color-black border-solid p-3"
          id="form"
    >

    @csrf
    <div class="p-2 w-1/2 row flex flex-wrap items-center justify-between">
        <input type="hidden" id="id" name="id" value="{{ old('id', $customer->id) }}">
        <div class="w-1/2 p-3">
            <label for="name">Name:</label>
            <input
                class="w-full form-control border border-black"
                type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
            <br><br>
        </div>
        <div class="w-1/2 p-3">
            <label for="document">Document:</label>
            <input
                class="w-full form-control border border-black"
                type="text" id="document" name="document" value="{{ old('document', $customer->document) }}" required>
            <br><br>
        </div>
        <div class="w-1/2 p-3">
            <label for="birthDate">Birth Date:</label>
            <input
                class="w-full form-control border border-black"
                type="date" id="birthDate" name="birthDate" value="{{ old('birthDate', $customer->birthDate) }}" required>
            <br><br>
        </div>

        <div class="w-1/2 p-3">
            <label for="email">Email:</label>
            <input
                class="w-full form-control border border-black"
                type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
            <br><br>
        </div>
        <div class="flex">
            <button
                    class="ms-2 bg-sky-500 hover:bg-sky-400 text-white mt-2 font-bold py-2 px-4 border-b-4 border-sky-700 hover:border-sky-500 rounded"
                    type="submit"
            >
                Update
            </button>
            <button
                    class="ms-2 bg-red-500 hover:bg-red-400 text-white mt-2 font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded"
                    type="button"
                    onclick="handleDelete(this)"
            >
                Deletar
            </button>
        </div>
    </div>
</form>

@endsection
@section('scripts')
    <script>
        function handleDelete(e){
            document.querySelector('#form').method='DELETE';
            document.querySelector('#form').action='{{route('customers.destroy',$customer)}}';
        }
    </script>
@endsection
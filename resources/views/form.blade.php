@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <h3>Cadastar/Editar veículo</h3>
        </div>

        <div class="card">
            <div class="card-body">
                {{-- enctype é usado quando for trabalhar com upload de arquivos --}}
                <form method="POST" enctype="multipart/form-data" action="{{ route('vehicle.store') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                value="{{ isset($item) ? $item->name : old('name') }}">

                            @error('name')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="brand">Marca</label>
                            <input type="text" class="form-control" id="brand" name="brand" autocomplete="off"
                                value="{{ isset($item) ? $item->brand : old('brand') }}">

                            @error('brand')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="vehicle_year">Ano</label>
                            <input type="text" class="form-control" id="vehicle_year" name="vehicle_year"
                                autocomplete="off" value="{{ isset($item) ? $item->vehicle_year : old('vehicle_year') }}">

                            @error('vehicle_year')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="kilometers">Kilometragem</label>
                            <input type="text" class="form-control" id="kilometers" name="kilometers" autocomplete="off"
                                value="{{ isset($item) ? $item->kilometers : old('kilometers') }}">

                            @error('kilometers')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="city">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" autocomplete="off"
                                value="{{ isset($item) ? $item->city : old('city') }}">

                            @error('city')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6 mb-3">
                            <label for="type">Tipo de veículo</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">Selecione uma opção</option>
                                <option value="Novo" @if ((isset($item) && $item->type == 'Novo') || (isset($item) && $item->type == old('type'))) selected @endif>
                                    Novo
                                </option>
                                <option value="Usado" @if ((isset($item) && $item->type == 'Usado') || (isset($item) && $item->type == old('type'))) selected @endif>
                                    Usado
                                </option>
                            </select>

                            @error('type')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-4 mb-3">
                            <label for="price">Preço</label>
                            <input type="text" class="form-control" id="price" name="price" autocomplete="off"
                                value="{{ isset($item) ? $item->price : old('price') }}">

                            @error('price')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-8 mb-3">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control" id="description" name="description"
                                autocomplete="off" value="{{ isset($item) ? $item->description : old('description') }}">

                            @error('description')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 mb-3">
                            <label for="image">Foto</label>
                            <input type="file" class="form-control" id="image" name="image" autocomplete="off"
                                value="{{ isset($item) ? $item->image : old('image') }}">

                            @error('image')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-4 mb-3">
                            <label for="contact_name">Nome do vendedor</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name"
                                autocomplete="off"
                                value="{{ isset($item) ? $item->contact_name : old('contact_name') }}">

                            @error('contact_name')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4 mb-3">
                            <label for="contact_phone">Telefone do vendedor</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                autocomplete="off"
                                value="{{ isset($item) ? $item->contact_phone : old('contact_phone') }}">

                            @error('contact_phone')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4 mb-3">
                            <label for="contact_mail">E-mail do vendedor</label>
                            <input type="text" class="form-control" id="contact_mail" name="contact_mail"
                                autocomplete="off"
                                value="{{ isset($item) ? $item->contact_mail : old('contact_mail') }}">

                            @error('contact_mail')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>

    </div>
@endsection

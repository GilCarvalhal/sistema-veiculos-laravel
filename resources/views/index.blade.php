@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Filtros</h4>
                        <hr>

                        <form method="GET" action="{{ route('vehicles.list') }}">
                            <div class="mb-3">
                                <label for="brand" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="brand" name="filter[brand]"
                                    autocomplete="off" value="{{ request()->filter['brand'] ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="vehicle_year" class="form-label">Ano</label>
                                <input type="range" class="form-control-range w-100" id="vehicle_year"
                                    name="filter[vehicle_year]" step="1" min="1990" max="2025"
                                    value="{{ request()->filter['vehicle_year'] ?? '2025' }}"
                                    oninput="document.getElementById('yearsRange').innerText = document.getElementById('vehicle_year').value">
                                <br>
                                Até <span id="yearsRange">{{ request()->filter['vehicle_year'] ?? '2025' }}</span>
                            </div>

                            <div class="mb-3">
                                <label for="kilometers" class="form-label">KM</label>
                                <input type="range" class="form-control-range w-100" id="kilometers"
                                    name="filter[kilometers]" step="1000" min="1000" max="200000"
                                    value="{{ request()->filter['kilometers'] ?? '200000' }}"
                                    oninput="document.getElementById('kilometersRange').innerText = document.getElementById('kilometers').value">
                                <br>
                                Até <span id="kilometersRange">{{ request()->filter['kilometers'] ?? '200000' }}</span>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Preço</label>
                                <input type="range" class="form-control-range w-100" id="price" name="filter[price]"
                                    step="1000" min="1000" max="200000"
                                    value="{{ request()->filter['price'] ?? '200000' }}"
                                    oninput="document.getElementById('priceRange').innerText = document.getElementById('price').value">
                                <br>
                                Até <span id="priceRange">{{ request()->filter['price'] ?? '200000' }}</span>
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="city" name="filter[city]"
                                    autocomplete="off" value="{{ request()->filter['city'] ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo de veículo</label>
                                <select name="filter[type]" id="type" class="form-select">
                                    <option value="">Selecione uma opção</option>
                                    <option @if (isset(request()->filter['type']) && request()->filter['type'] == 'Novo') selected @endif>
                                        Novo
                                    </option>
                                    <option @if (isset(request()->filter['type']) && request()->filter['type'] == 'Usado') selected @endif>
                                        Usado
                                    </option>
                                </select>
                            </div>

                            <div class="d-grip gap-2">
                                <button class="btn btn-primary mb-3" type="submit">Filtrar</button>
                                <a href="{{ route('vehicles.list') }}" class="btn btn-outline-secondary mb-3">Limpar
                                    filtros</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-9">teste 2</div>
        </div>
    </div>
@endsection

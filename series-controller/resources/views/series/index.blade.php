@extends('layout')

@section('header')
Séries
@endsection

@section('content')

    @include('message', ['message' => $message])

    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="name-serie-{{ $serie->id }}">{{ $serie->name }}</span>

            <div class="input-group w-50" hidden id="input-name-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->name }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                @auth
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                @endauth

                <a href="/series/seasons/{{$serie->id}}" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
    
                @auth
                    <form method="POST" action="/series/{{$serie->id}}" 
                        onsubmit="return confirm('Tem certeza que deseja remover a serie {{ addslashes($serie->name) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                @endauth
            </span>

        </li>
        @endforeach
    </ul>
    
<script>

    function toggleInput(serieId) {
        const nameSerieEl = document.getElementById(`name-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-name-serie-${serieId}`);

        if (nameSerieEl.hasAttribute('hidden')) {
            nameSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nameSerieEl.hidden = true;
        }
    }

    function editSerie(serieId) {
        let formData = new FormData();
        const name = document.querySelector(`#input-name-serie-${serieId} > input`).value;
        const token = document.querySelector('input[name="_token"]').value;

        formData.append('name', name);
        formData.append('_token', token);
        
        const url = `/series/${serieId}/editName`
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            const nameSerieEl = document.getElementById(`name-serie-${serieId}`).textContent = name;
        });
    }

</script>

@endsection
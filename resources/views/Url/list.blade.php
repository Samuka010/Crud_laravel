@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('NewUrl') }}"><button type="button" class="btn btn-outline-success">Nova Url</button></a>
                    <h4 class="text-center">Lista de Url</h4>
                    <p class="text-primary">A lista de URLs Será Atualizada de Minuto a Minuto</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Url</th>
                            <th scope="col">Situação/Status</th>
                            <th scope="col">Data de Verificação</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($mUrl as $mUrl)
                        <tr>
                            <th scope="row">{{$mUrl->id}}</th>
                            <td>{{$mUrl->url}}</td>
                            <td>
                                @if($mUrl->situacao == 'aguardando')
                                    <span class="badge bg-warning text-dark">Aguardando</span>
                                @else
                                    {{$mUrl->situacao}}
                                @endif
                            </td>
                            <td>
                                <!-- Verificando se esta aguardando ou ja foi verificado -->
                                @if($mUrl->situacao == 'aguardando')
                                    <span class="badge bg-warning text-dark">Aguardando</span>
                                @else
                                    {{date('d/m/Y H:i:s', strtotime($mUrl->data_verifica))}}
                                @endif
                            </td>
                            <td>
                                <a href="EditUrl/{{ $mUrl->id }}" type="button" class="btn btn-outline-info">Editar</a>
                            </td>
                            <td>
                                <a href="DeleteUrl/{{ $mUrl->id }}" type="button" class="btn btn-outline-danger">Deletar</a>
                            </td>
                        </tr>
                        
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

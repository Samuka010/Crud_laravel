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

                    <h4 class="text-center">Edição de Url</h4>
                    <a href="{{ url('ListUrl') }}"><button type="button" class="btn btn-outline-info">Voltar a Lista</button></a>

                   

                    <form action="{{ url('EditUrl/edit') }}/{{$eUrl->id}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Url</label>
                            <input type="text" name="url" class="form-control" value="{{ $eUrl->url }}">
                            <input type="hidden" name="situacao" class="form-control" value="aguardando">
                        </div><br>
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </form>
                    <hr>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

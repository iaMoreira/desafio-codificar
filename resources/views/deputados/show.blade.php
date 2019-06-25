@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Deputados</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Lista</h2>
          <div class="clearfix"></div>
        </div>

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        @if (Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="x_content">
        <br />

        <table class="table table-striped projects" id="rvs-table">
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>PARTIDO</th>
                <th style="text-align: right;">AÇÕES</th>
            </thead>
            @if ($deputados)
            <tbody>
                @foreach($deputados as $deputado)    
                            <tr>
                                <td>{{ strtoupper($deputado->id) }}</td>
                                <td>{{ strtoupper($deputado->nome) }}</td>
                                <td>{{ strtoupper($deputado->partido) }}</td>
                                <td>
                                    {{--  {!! Form::open([
                                        'method' => 'delete',
                                        'url' => ['auth/delete', $usuario->id],
                                        'onsubmit' => 'return ConfirmDelete()'
                                    ]) !!}  --}}
                                    <button class="btn btn-danger btn-xs" type="submit" title="Excluir" style="float:right;"><i class="fa fa-trash"></i></button>
                                    {{--  {!! Form::close() !!}
                                    {!! Form::open([
                                            'method' => 'GET',
                                            'url' => ['auth/edit', $usuario->id],
                                        ]) !!}  --}}
                                        <button class="btn btn-info btn-xs" type="submit" title="Editar"  style="float:right;"><i class="fa fa-pencil"></i></button>
                                    {{--  {!! Form::close() !!}  --}}
                                </td>
                            </tr>
                @endforeach
            </tbody>
            @endif
        </table> 
           
        </div>
          
          {{--  <a href="#" class="btn btn-primary">Novo usuário</a>  --}}
    </div>
  </div>
 </div>
</div>

@endsection


@section('scripts')

<script type="text/javascript">

    $('#rvs-table').DataTable({
            "bPaginate": true,
            "bServerSide": false,
            "bLengthChange": true,
            "pageLength": 10,
            "bAutoWidth": true,
            "processing": true,
            "oLanguage":{
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar ",
            "oPaginate": {
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último"
            },
        }            
    });

    function ConfirmDelete()
    {
    var x = confirm("Tem certeza que deseja desativar este usuário?");
    if (x)
    return true;
    else
    return false;
    }

</script>

@stop

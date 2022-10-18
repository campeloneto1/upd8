@extends('app')

@section('pagina', 'Clientes')

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-xl"><i class="fa fa-plus" aria-hidden="true"></i></button>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Cliente cadastrado com sucesso!</h5>
            Success alert preview. This alert is dismissable.
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger  alert-dismissible">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Algo errado, tente novamente mais tarde!</h5>
            Danger alert preview. This alert is dismissable.
        </div>
        @endif

        <table id="myTable" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>DT NASCIMENTO</th>
                    <th>SEXO</th>
                    <th>ENDEREÇO</th>
                    <th>CIDADE</th>
                    <th>ESTADO</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody id="tableClientes">
                @foreach ($data as $cliente)
                <tr>
                    <td>@if($cliente->id){{$cliente->id}}@endif</td>
                    <td>@if($cliente->nome){{$cliente->nome}}@endif</td>
                    <td>@if($cliente->cpf){{$cliente->cpf}}@endif</td>
                    <td>@if($cliente->data_nascimento){{date('d/m/Y',strtotime($cliente->data_nascimento))}}@endif</td>
                    <td>
                        @if($cliente->sexo_id)
                        @if ($cliente->sexo_id == 1)
                        Feminino
                        @endif
                        @if ($cliente->sexo_id == 2)
                        Masculino
                        @endif
                        @endif
                    </td>
                    <td>@if($cliente->endereco){{$cliente->endereco}}@endif</td>
                    <td>@if($cliente->cidade){{$cliente->cidade->nome}}@endif</td>
                    <td>@if($cliente->estado){{$cliente->estado->nome}}@endif</td>
                    <td>
                        <a onclick="editCliente({{$cliente}})" data-bs-toggle="modal" data-bs-target="#modal-editar" style="margin-left: 5px; cursor: pointer;"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                        <a onclick="deleteCliente({{$cliente->id}})" style="margin-left: 5px; cursor: pointer;"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</div>


<!-- INICIO MODAL CADASTRO -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form" id="form" method="post" action="{{url('/')}}">
                <div class="modal-body">
                    @csrf

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nome">Nome<span class="text-danger">*</span></label>
                                <input type="text" minlength="10" class="form-control rounded-0" name="nome" id="nome" required placeholder="Nome" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cpf">CPF<span class="text-danger">*</span></label>
                                <input type="text" minlength="11" maxlength="11" class="form-control rounded-0" name="cpf" id="cpf" required placeholder="CPF" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="data_nascimento">DT. Nascimento</label>
                                <input type="date" class="form-control rounded-0" name="data_nascimento" id="data_nascimento" placeholder="Data Nascimento" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="sexo_id">Sexo</label>
                                <select class="custom-select rounded-0" name="sexo_id" id="sexo_id">
                                    <option></option>
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" minlength="10" class="form-control rounded-0" name="endereco" id="endereco" placeholder="Endereço" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="estado_id">Estado</label>
                                <select onchange="getCidades()" class="custom-select rounded-0" name="estado_id" id="estado_id">
                                    <option></option>
                                    @foreach ($estados as $est)
                                    <option value="{{$est->id}}">{{$est->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cidade_id">Cidade</label>
                                <select class="custom-select rounded-0" name="cidade_id" id="cidade_id">

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer ">
                    <input type='reset' class="btn btn-default" value='Limpar' name='reset'>
                    <button id="savedata" type="submit" data-bs-dismiss="modal" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIM MODAL CADASTRO -->

<!-- INICIO MODAL EDITAR -->
<div class="modal fade" id="modal-editar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form2" id="form2">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id" />
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nome2">Nome<span class="text-danger">*</span></label>
                                <input type="text" minlength="10" class="form-control rounded-0" name="nome2" id="nome2" required placeholder="Nome" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cpf2">CPF<span class="text-danger">*</span></label>
                                <input type="text" minlength="11" maxlength="11" class="form-control rounded-0" name="cpf2" id="cpf2" required placeholder="CPF" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="data_nascimento2">DT. Nascimento</label>
                                <input type="date" class="form-control rounded-0" name="data_nascimento2" id="data_nascimento2" placeholder="Data Nascimento" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="sexo_id2">Sexo</label>
                                <select class="custom-select rounded-0" name="sexo_id2" id="sexo_id2">
                                    <option></option>
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="endereco2">Endereço</label>
                                <input type="text" minlength="10" class="form-control rounded-0" name="endereco2" id="endereco2" placeholder="Endereço" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="estado_id2">Estado</label>
                                <select onchange="getCidades()" class="custom-select rounded-0" name="estado_id2" id="estado_id2">
                                    <option></option>
                                    @foreach ($estados as $est)
                                    <option value="{{$est->id}}">{{$est->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cidade_id2">Cidade</label>
                                <select class="custom-select rounded-0" name="cidade_id2" id="cidade_id2">

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer ">
                    <input type='reset' class="btn btn-default" value='Limpar' name='reset'>
                    <button onclick="confirm()" id="savedata2" type="button" data-bs-dismiss="modal" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIM MODAL EDITAR -->

<script>
    $(document).ready(function() {
        //refresh();
        $('#myTable').DataTable();
        //getEstados();
    });

    function getCidades() {
        //var est = $("input[name=estado_id]").val();
        var idcid = 0;
        var selectBox = document.getElementById('estado_id');
        var userInput = selectBox.options[selectBox.selectedIndex].value;
        var selectBox2 = document.getElementById('estado_id2');
        var userInput2 = selectBox2.options[selectBox2.selectedIndex].value;
        if (userInput) {
            idcid = userInput;
        } else {
            idcid = userInput2;
        }

        //console.log(userInput)
        $('#cidade_id').html("");
        $.ajax({
            url: "cidades/" + idcid + "/where",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: document.body,
            success: function(response) {
                //console.log(response);
                if (userInput) {
                    $("#cidade_id").append('<option value=""></option>');
                    for (var i = 0; i < response.length; i++) {
                        $("#cidade_id").append('<option value="' + response[i].id + '">' + response[i].nome + '</option>');
                    }
                } else {
                    $("#cidade_id2").append('<option value=""></option>');
                    for (var i = 0; i < response.length; i++) {
                        $("#cidade_id2").append('<option value="' + response[i].id + '">' + response[i].nome + '</option>');
                    }
                }


            },
        });
    }

    function deleteCliente(response) {
        //console.log(response);
        if (confirm("Tem certeza que deseja excluir o cliente?") == true) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/clientes/" + response,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {

                    _token: _token
                },

                success: function(response) {
                    //console.log(response);
                    if (response == 1) {
                        location.reload();
                    }
                },
                error: function(error) {
                    //console.log(error);
                }
            });
        }


    }

    function editCliente(response) {
        //console.log(response);
        $('#form2').attr('action', '/clientes/' + response.id);
        document.getElementById("nome2").value = response.nome;
        document.getElementById("cpf2").value = response.cpf;
        document.getElementById("data_nascimento2").value = response.data_nascimento;
        document.getElementById("sexo_id2").value = response.sexo_id;
        document.getElementById("endereco2").value = response.endereco;

        document.getElementById("estado_id2").value = response.estado_id;
        document.getElementById("id").value = response.id;
        getCidades2(response.estado_id);
        document.getElementById("cidade_id2").value = response.cidade_id;

    }

    function getCidades2(id) {
        //var est = $("input[name=estado_id]").val();

        //console.log(userInput)
        $('#cidade_id2').html("");
        $.ajax({
            url: "cidades/" + id + "/where",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: document.body,
            success: function(response) {
                //console.log(response);
                $("#cidade_id2").append('<option value=""></option>');
                for (var i = 0; i < response.length; i++) {
                    $("#cidade_id2").append('<option value="' + response[i].id + '">' + response[i].nome + '</option>');
                }

            },
        });
    }

    function confirm() {
        let nome = $("input[name=nome2]").val();
        let cpf = $("input[name=cpf2]").val();
        let data_nascimento = $("input[name=data_nascimento2]").val();
        
        let endereco = $("input[name=endereco2]").val();

        var selectBox3 = document.getElementById('sexo_id2');
        var userInput3 = selectBox3.options[selectBox3.selectedIndex].value;

        var selectBox = document.getElementById('estado_id2');
        var userInput = selectBox.options[selectBox.selectedIndex].value;

        var selectBox2 = document.getElementById('cidade_id2');
        var userInput2 = selectBox2.options[selectBox2.selectedIndex].value;


        let id = $("input[name=id]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/clientes/" + id,
            type: "PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nome: nome,
                cpf: cpf,
                data_nascimento: data_nascimento,
                sexo_id: userInput3,
                endereco: endereco,
                cidade_id: userInput2,
                estado_id: userInput,
                _token: _token
            },
            success: function(response) {
                //console.log(response);
                if (response == 1) {
                    location.reload();
                }
            },
            error: function(error) {
                //console.log(error);
            }
        });
    }
</script>

@endsection
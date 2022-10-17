
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPD8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script nonce="76d60a77-3a9b-492b-975c-e37b25bae535">(function(w,d){!function(Z,_,ba,bb){Z.zarazData=Z.zarazData||{};Z.zarazData.executed=[];Z.zaraz={deferred:[],listeners:[]};Z.zaraz.q=[];Z.zaraz._f=function(bc){return function(){var bd=Array.prototype.slice.call(arguments);Z.zaraz.q.push({m:bc,a:bd})}};for(const be of["track","set","debug"])Z.zaraz[be]=Z.zaraz._f(be);Z.zaraz.init=()=>{var bf=_.getElementsByTagName(bb)[0],bg=_.createElement(bb),bh=_.getElementsByTagName("title")[0];bh&&(Z.zarazData.t=_.getElementsByTagName("title")[0].text);Z.zarazData.x=Math.random();Z.zarazData.w=Z.screen.width;Z.zarazData.h=Z.screen.height;Z.zarazData.j=Z.innerHeight;Z.zarazData.e=Z.innerWidth;Z.zarazData.l=Z.location.href;Z.zarazData.r=_.referrer;Z.zarazData.k=Z.screen.colorDepth;Z.zarazData.n=_.characterSet;Z.zarazData.o=(new Date).getTimezoneOffset();Z.zarazData.q=[];for(;Z.zaraz.q.length;){const bl=Z.zaraz.q.shift();Z.zarazData.q.push(bl)}bg.defer=!0;for(const bm of[localStorage,sessionStorage])Object.keys(bm||{}).filter((bo=>bo.startsWith("_zaraz_"))).forEach((bn=>{try{Z.zarazData["z_"+bn.slice(7)]=JSON.parse(bm.getItem(bn))}catch{Z.zarazData["z_"+bn.slice(7)]=bm.getItem(bn)}}));bg.referrerPolicy="origin";bg.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));bf.parentNode.insertBefore(bg,bf)};["complete","interactive"].includes(_.readyState)?zaraz.init():Z.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Clientes</a>
                </li>

            </ul>

        </nav>

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Clientes</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Clientes</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-1">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-xl"><i class="fa fa-plus" aria-hidden="true"></i></button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

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
                                </tr>
                            </thead>
                            <tbody id="tableClientes">
                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer">
                        Footer
                    </div>

                </div>


                <!-- INICIO MODAL -->
                <div class="modal fade" id="modal-xl">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cadastrar</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form >
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nome">Nome<span class="text-danger">*</span></label>
                                                <input type="text" minlength="10" class="form-control rounded-0" name="nome" id="nome" required placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="cpf">CPF<span class="text-danger">*</span></label>
                                                <input type="text" minlength="11" maxlength="11" class="form-control rounded-0" name="cpf" id="cpf" required placeholder="CPF">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="data_nascimento">DT. Nascimento</label>
                                                <input type="date" class="form-control rounded-0" name="data_nascimento" id="data_nascimento" placeholder="Data Nascimento">
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
                                                <input type="text" minlength="10" class="form-control rounded-0" name="endereco" id="endereco"  placeholder="Endereço">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="estado_id">Estado</label>
                                                <select onchange="getCidades()" class="custom-select rounded-0" name="estado_id" id="estado_id"> 
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="cidade_id">Cidade</label>
                                                <select class="custom-select rounded-0" name="cidade_id" id="cidade_id"> 
                                                    <option></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer ">
                                    <input type='reset' class="btn btn-default" value='Limpar' name='reset'>
                                    <button id="savedata" type="button" data-bs-dismiss="modal" class="btn btn-success">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL -->


            </section>

        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2022 <a href="https://www.upd8.com.br/">UPD8</a>.</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>
    <script>
        $(document).ready(function(){
            refresh();
            getEstados();
        });

        $("#savedata").click(function(event){
          event.preventDefault();

          let nome = $("input[name=nome]").val();
          let cpf = $("input[name=cpf]").val();
          let data_nascimento = $("input[name=data_nascimento]").val();
          let sexo_id = $("input[name=sexo_id]").val();
          let endereco = $("input[name=endereco]").val();
          let cidade_id = $("input[name=cidade_id]").val();
          let estado_id = $("input[name=estado_id]").val();
          let _token   = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            url: "/clientes",
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              nome:nome,
              cpf:cpf,
              data_nascimento:data_nascimento,
              sexo_id:sexo_id,
              endereco:endereco,
              cidade_id:cidade_id,
              estado_id:estado_id,
              _token: _token
          },
          success:function(response){
              //console.log(response);
              if(response == 1){
                refresh();

            }
        },
        error: function(error) {
         //console.log(error);

     }
 });
      });

        function refresh(){
            $('#tableClientes').html("");
            $.ajax({ url: "clientes",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: document.body,
            success:function(response){
                  //console.log(response);

                  for (var i = 0; i < response.length; i++) {
                     $("#tableClientes").append("<tr><td>" + response[i].id + "</td><td>" + response[i].nome + "</td><td>" + response[i].cpf + "</td><td>" + response[i].data_nascimento + "</td><td>" + response[i].sexo_id + "</td><td>" + response[i].endereco + "</td><td>" + response[i].cidade.nome + "</td><td>" + response[i].estado.nome + "</td></tr>");
                 }
                 $('#myTable').DataTable();
             },
         });
        }

        function getEstados(){
            $('#estado_id').html("");
            $.ajax({ url: "estados",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: document.body,
            success:function(response){
                  //console.log(response);
                  $("#estado_id").append('<option value=""></option>');
                  for (var i = 0; i < response.length; i++) {
                     $("#estado_id").append('<option value="'+response[i].id+'">' + response[i].nome + '</option>');
                 }
                 
             },
         });
        }

        function getCidades(){
            var est = $("input[name=estado_id]").val();
            console.log(est)
            $('#cidade_id').html("");
            $.ajax({ url: "cidades/"+est+"/where",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: document.body,
            success:function(response){
                  //console.log(response);
                  $("#cidade_id").append('<option value=""></option>');
                  for (var i = 0; i < response.length; i++) {
                     $("#cidade_id").append('<option value="'+response[i].id+'">' + response[i].nome + '</option>');
                 }
                 
             },
         });
        }
    </script>

    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>
</html>

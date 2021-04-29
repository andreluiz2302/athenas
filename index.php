<!DOCTYPE html>
<html>
<head>
    <title> CRUD Simples com DataTable </title>

    <!-- chamada Bootstrap-Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

    <!-- chamada DataTable-Lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"> </script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

    <style type="text/css">
        .content{
            max-width: 800px;
            margin: auto;
        }

        h1{
            text-align: center;
            padding-bottom: 60px;            
        }
    </style>

</head>
<body>

    <h1>CRUD Simples com DataTable</h1></br>
        
    <div class="content">
        <table id="course_table" class="table table-striped">
            <thead bgcolor="#6cd8dc">
                <tr class="table-primary">
                    <th width="10%"> Código </th>
                    <th width="35%"> Nome </th>
                    <th width="30%"> E-mail </th>
                    <th width="15%"> Categoria </th>
                    <th scope="col" width="5%"> Editar </th>
                    <th scope="col" width="5%"> Deletar </th>
                </tr>
            </thead>
            
        </table>
        <div allign="right">
            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success">Adicionar</button>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="course_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Adicionar Pessoas</h4>
                </div>
                <div class="modal-body">
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control"/>
                    </br><label>E-mail</label>
                    <input type="text" name="email" id="email" class="form-control"/>
                    </br><label>Categoria</label>
                    <input type="text" name="categoria" id="categoria" class="form-control"/>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id"/>
                    <input type="hidden" name="operation" id="operation"/>
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Salvar"/>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#course_form')[0].reset();
                $('.modal-title').text("Adicionar Pessoas");
                $('#action').val("Add");
                $('#operation').val("Add")
            });
        
            var dataTable = $('#course_table').DataTable({
                "paging":true,
                "processing":true,
                "serverSide":true,
                "order":[],
                "info":true,
                "ajax":{

                        url:"fetch.php",
                        type:"POST"
                },
                "columnDefs":[
                    {
                        "target":[0,3,4],
                        "orderable":false,           

                    },
                ],
            });

            $(document).on('submit', '#course_form', function(event){
                event.preventDefault();
                var id = $('#id').val();
                var nome = $('#nome').val();
                var email = $('#email').val();
                var categoria = $('#categoria').val();

                if(nome != '' && email != '' && categoria != '')
                {
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            $('#course_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else{
                    alert("Nome, Number of peaple fields are requided");
                }
            });
            $(document).on('click', '.update', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"fetch_single.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('#id').val(data.id);
                        $('#nome').val(data.nome);
                        $('#email').val(data.email);
                        $('#categoria').val(data.categoria);
                        $('modal-title').text("Edit Detalhes");
                        $('#id').val(id);
                        $('#action').val("Save");
                        $('#operation').val("Edit");

                    }

                });
            })

            $(document).on('click','.delete', function(){
                var id = $(this).attr("id");
                if(confirm("Tem certeza que deseja deletar esta pessoa?"))
                {
                    $.ajax({
                        url:"delete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            dataTable.ajax.reload();
                        }
                    });
                }
                else{
                    return false;
                }
            });

        });
</script>
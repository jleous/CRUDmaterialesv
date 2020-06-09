<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Leo</title>
</head>

<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Insertar Material</h4>
                <form id="nuevoMaterialForm">
                    <div class="form-group">
                        <label for="nombre">Nombre del Material</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <select name="familia" id="familia" class="form-control">
                            <option value="">Seleccione Familia</option>
                            <option value="cuarzo">Cuarzo</option>
                            <option value="granito">Granito</option>
                            <option value="marmol">Marmol</option>
                            <option value="neolith">Neolith</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <select name="espesor" id="espesor" class="form-control">
                            <option value="">Seleccione Espesor</option>
                            <option value="6">6mm</option>
                            <option value="10">10mm</option>
                            <option value="12">12mm</option>
                            <option value="15">15mm</option>
                            <option value="18">18mm</option>
                            <option value="20">20mm</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-info" id="guardar">Guardar Material</button>

                </form>
            </div>
            <div class="col-md-8">


                <div id="tabla"></div>



            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="formEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form id="editMaterial">
                        <input type="text" hidden id="idu" name='idu'>
                        <div class="form-group">
                            <label for="nombreu">Nombre del Material</label>
                            <input type="text" class="form-control" id="nombreu" name="nombreu">
                        </div>
                        <div class="form-group">
                            <label for="familiau">Familia del Material</label>
                            <select name="familiau" id="familiau" class="form-control">
                                <option value="">Seleccione Familia</option>
                                <option value="cuarzo">Cuarzo</option>
                                <option value="granito">Granito</option>
                                <option value="marmol">Marmol</option>
                                <option value="neolith">Neolith</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="nombreu">Espesor del Material</label>
                            <select name="espesoru" id="espesoru" class="form-control">
                                <option value="">Seleccione Espesor</option>
                                <option value="6">6mm</option>
                                <option value="10">10mm</option>
                                <option value="12">12mm</option>
                                <option value="15">15mm</option>
                                <option value="18">18mm</option>
                                <option value="20">20mm</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-info" id="actualizar">Editar Material</button>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $('#tabla').load('vistas/tablamateriales.php')

        $('#guardar').click(function() {
            var nombre = $('#nombre').val();
            var familia = $('#familia').val();
            var espesor = $('#espesor').val();
            if (nombre == "" || familia == "" || espesor == "") {
                alert('Por favor llenar con datos validos')
            } else {
                var datos = $('#nuevoMaterialForm').serialize();
                $.ajax({
                    url: 'controladores/crearmaterial.php',
                    type: 'POST',
                    data: datos,
                    success: function(r) {
                        alert(r);
                        $('#tabla').load('vistas/tablamateriales.php')

                    }
                });
            };
        });
    })

    function eliminar(id) {
        var id = "id=" + id;
        $.ajax({
            url: "controladores/eliminarMaterial.php",
            data: id,
            type: "POST",
            success: function(r) {
                if (r == 1) {
                    alert('eliminado con exito');
                    $('#tabla').load('vistas/tablamateriales.php');
                } else {
                    alert('fallo al eliminar');
                }
            }
        })
    }

    function llenarFormEditar(id) {
        $.ajax({
            url: "controladores/llenarFrmEditar.php",
            data: "id=" + id,
            type: "POST",
            success: function(r) {
                var material = JSON.parse(r);
                var id = material['id'];
                var familia = material['familia'];
                var nombre = material['nombre'];
                var espesor = material['espesor'];

                $("#idu").val(id);
                $("#nombreu").val(nombre);
                $("#familiau").val(familia);
                $("#espesoru").val(espesor);
            }
        })
    }
    $('#actualizar').click(function() {
        var id = $('#idu').val();
        var nombre = $('#nombreu').val();
        var familia = $('#familiau').val();
        var espesor = $('#espesoru').val();
        if (nombre == "" || familia == "" || espesor == "") {
            alert('Por favor llenar con datos validos')
        } else {
            var datos = $('#editMaterial').serialize();
            $.ajax({
                url: 'controladores/actualizarMaterial.php',
                type: 'POST',
                data: datos,
                success: function(r) {
                    alert(r);
                    $('#tabla').load('vistas/tablamateriales.php')

                }
            });
        };

    })
</script>
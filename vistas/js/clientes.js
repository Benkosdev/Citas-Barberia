// ELIMINAR CLIENTE

$(".DT").on("click", ".eliminarCliente", function() {

    let cId = $(this).attr("cId");
    let imgC = $(this).attr("imgC");


    window.location = "index.php?url=clientes&cId=" + cId + "&imgC=" + imgC;

})


// EDITAR CLIENTE

$(".DT").on("click", ".editarCliente", function() {

    let cId = $(this).attr("cId");
    let datos = new FormData();

    datos.append("cId", cId);

    $.ajax({

        url: "ajax/clientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado) {

            $("#cId").val(resultado["id"]);
            $("#apellidoE").val(resultado["apellido"]);
            $("#nombreE").val(resultado["nombre"]);
            $("#celularE").val(resultado["celular"]);
            $("#usuarioE").val(resultado["usuario"]);
            $("#claveE").val(resultado["clave"]);
        }
    })
})


$("#usuario").change(function() {

    $(".alert").remove();

    let usuario = $(this).val();
    let datos = new FormData();
    datos.append("Norepetir", usuario);

    $.ajax({

        url: "ajax/clientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado) {

            if (resultado) {

                $("#usuario").parent().after('<div class="alert alert-danger">El Usuario ya existe.</div>');

                $("#usuario").val("");


            }


        }


    })

})


// Alerta para edicion de datos USUARIO
$("#usuarioE").change(function() {

    $(".alert").remove();

    let usuario = $(this).val();
    let datos = new FormData();
    datos.append("Norepetir", usuario);

    $.ajax({

        url: "ajax/clientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado) {

            if (resultado) {

                $("#usuarioE").parent().after('<div class"alert alert-danger">El Usuario ya existe.</div>');

                $("#usuarioE").val("");


            }


        }


    })

})
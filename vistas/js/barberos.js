$(".DT").on("click", ".editarBarbero", function() {

    let bId = $(this).attr("bId");
    let datos = new FormData();

    datos.append("bId", bId);

    $.ajax({

        url: "ajax/barberosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,

        success: function(resultado) {

            $("#bId").val(resultado["id"]);
            $("#apellidoE").val(resultado["apellido"]);
            $("#nombreE").val(resultado["nombre"]);
            $("#usuarioE").val(resultado["usuario"]);
            $("#claveE").val(resultado["clave"]);
            $("#sedeE").val(resultado["sede"]);

            $("#serviciosE").html(resultado["servicios"]);
            $("#serviciosE").val(resultado["servicios"]);

        }

    })

})

let bId = $(this).attr("bId");
let imgB = $(this).attr("imgB");

//Eliminacion de barberos
$(".DT").on("click", ".eliminarBarbero", function() {



    window.location = "index.php?url=barberos&bId=" + bId + "&imgB=" + imgB;


})


/* 
//Imlementacion de DatataBle
$(".DT").DataTable({






}) */

//FIn de codigo de DataTable
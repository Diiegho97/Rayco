$(document).ready(function () {
    let url = "https://fierce-meadow-17309.herokuapp.com/controlador/";
 
    $.ajax({
        type: "GET",
        url: url + "operacion.php",
        dataType: "json",
        success: function (result) {
            if (result.status === 1) { 
                let items = result.data;
                for (let i = 0; i < items.length; i++) {
                    $("#tbody").append("<tr>" +
                        "<td>" + items[i][0] + "</td>" +
                        "<td>" + items[i][1] + "</td> " +
                        "<td>" + items[i][2] + "</td> " +
                        "<td>" + items[i][3] + "</td> " +
                        "<td>" + items[i][4] + "</td> " +
                        "</tr> ");
                }
            }
        }, error: function (error) {
            Swal.fire({
                icon: 'error',
                text: "Error de conexion"
            })
            console.error("Error", error);
        }
    });

    $('#limpiar').click(function(){
        $("#numero1").val("");
        $("#numero2").val("");
        $("#resultado").val("");
        $("#selectOperacion").val('0').change();
    });

    $("#enviar").click(function () {
        let json = {
            numero1: $("#numero1").val(),
            numero2: $("#numero2").val(),
            operacion: $("#selectOperacion").val()
        }
        console.log("resuñ", json);
        if (($("#numero2").val() == 0) && ($("#selectOperacion").val() == "dividir")) {
            alert("No divir por 0 ");
        } else {

            $.ajax({
                type: "POST",
                url: url + "operacion.php",
                data: json,
                dataType: "json",
                success: function (result) {
                    if (result.status === 1) {
                        $("#resultado").val(result.data);
                        location.reload();
                    } else {
                        $("#resultado").val("Error")
                    }
                }, error: function (error) {

                    console.error("Error", error);
                }
            });
        };
    });
});
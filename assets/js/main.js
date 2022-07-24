$(document).ready(function () {
    console.log(":v");
 

    let url = "http://localhost/prueba_diego/controlador/";


    $.ajax({
        type: "GET",
        url: url + "operacion.php",
        dataType: "json",
        success: function (result) {
            if (result.status === 1) {
                let items = result.data;
                for (let i = 0; i < items.length; i++) {
                    $("#tbody").append(" <tr>" +
                        "< td >" + items[i].numero1 + "</td>" +
                        " <td >" + items[i].numero2 + "</> " +
                        " <td >" + items[i].resultado + "</> " +
                        " <td >" + items[i].fecha + "</> " +
                        " </tr> ");
                }
            }
        }, error: function (error) {
            /*Swal.fire({
                icon: 'error',
                text: "Error de conexion"
            });*/
            console.error("Error", error);
        }
    });


    $("#enviar").click(function () {
        console.log("Click");
        let json = {
            numero1: $("#numero1").val(),
            numero2: $("#numero2").val(),
            operacion: $("#selectOperacion").val()
        }
        console.log("resuñ", json);
        if (($("#numero2").val() == 0) && ($("#selectOperacion").val() == "dividir")) {
            alert("No divir por 0 ");
        } else {

            console.log(url + "operacion.php");

            $.ajax({
                type: "POST",
                url: url + "operacion.php",
                data: json,
                dataType: "json",
                success: function (result) {
                    if (result.status === 1) {
              
                    } else {
                
                    }
                }, error: function (error) {
 
                    console.error("Error", error);
                }
            });
        };
    });
});
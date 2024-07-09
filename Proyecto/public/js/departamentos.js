document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitDepartmentForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                nombre: document.getElementById("nombre").value,
                descripcion: document.getElementById("descripcion").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/departamento.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/departamento.controller.php?op=insertar";
            
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert(`Departamento ${id ? 'actualizado' : 'guardado'} exitosamente!`);
                        location.reload();
                    } else {
                        alert(`Error al ${id ? 'actualizar' : 'guardar'} el departamento.`);
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    document.querySelectorAll(".editDepartment").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/departamento.controller.php?op=uno", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data) {
                        var nombreInput = document.getElementById("nombre");
                        var descripcionInput = document.getElementById("descripcion");
                        
                        if (nombreInput && descripcionInput) {
                            nombreInput.value = data.nombre;
                            descripcionInput.value = data.descripcion;
                            document.getElementById("submitDepartmentForm").dataset.id = id;
                        } else {
                            console.error("Elementos del formulario no encontrados");
                        }
                    } else {
                        alert("Error al cargar los datos del departamento.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteDepartment").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/departamento.controller.php?op=eliminar&id=${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert("Departamento eliminado exitosamente!");
                        location.reload();
                    } else {
                        alert("Error al eliminar el departamento.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

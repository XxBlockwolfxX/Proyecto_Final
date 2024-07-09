document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitDepartmentForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var nombreInput = document.getElementById("nombre_departamento");
            if (!nombreInput) {
                console.error("Elementos del formulario no encontrados");
                return;
            }
            var data = {
                nombre_departamento: nombreInput.value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/departamento.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/departamento.controller.php?op=insertar";
            
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`Departamento ${id ? 'actualizado' : 'guardado'} exitosamente!`);
                    location.reload();
                } else {
                    alert(`Error al ${id ? 'actualizar' : 'guardar'} el departamento.`);
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
            .then(response => response.json())
            .then(data => {
                if (data) {
                    var nombreInput = document.getElementById("nombre_departamento");
                    if (!nombreInput) {
                        console.error("Elementos del formulario no encontrados");
                        return;
                    }
                    nombreInput.value = data.nombre_departamento;
                    document.getElementById("submitDepartmentForm").dataset.id = id;
                } else {
                    alert("Error al cargar los datos del departamento.");
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
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Departamento eliminado exitosamente!");
                    location.reload();
                } else {
                    alert("Error al eliminar el departamento.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

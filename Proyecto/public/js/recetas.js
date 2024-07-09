document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitRecetaForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                id_cita: document.getElementById("id_cita").value,
                medicamento: document.getElementById("medicamento").value,
                dosis: document.getElementById("dosis").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/receta.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/receta.controller.php?op=insertar";
            
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
                    alert(`Receta ${id ? 'actualizada' : 'guardada'} exitosamente!`);
                    location.reload();
                } else {
                    alert(`Error al ${id ? 'actualizar' : 'guardar'} la receta.`);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    document.querySelectorAll(".editReceta").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/receta.controller.php?op=uno", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById("id_cita").value = data.id_cita;
                    document.getElementById("medicamento").value = data.medicamento;
                    document.getElementById("dosis").value = data.dosis;
                    document.getElementById("submitRecetaForm").dataset.id = id;
                } else {
                    alert("Error al cargar los datos de la receta.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteReceta").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/receta.controller.php?op=eliminar&id=${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Receta eliminada exitosamente!");
                    location.reload();
                } else {
                    alert("Error al eliminar la receta.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

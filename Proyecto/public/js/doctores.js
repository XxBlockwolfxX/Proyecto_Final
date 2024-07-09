document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitDoctorForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                nombre_doctor: document.getElementById("nombre_doctor").value,
                especialidad: document.getElementById("especialidad").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/doctor.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/doctor.controller.php?op=insertar";
            
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
                        alert(`Doctor ${id ? 'actualizado' : 'guardado'} exitosamente!`);
                        location.reload();
                    } else {
                        alert(`Error al ${id ? 'actualizar' : 'guardar'} el doctor.`);
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    document.querySelectorAll(".editDoctor").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/doctor.controller.php?op=uno", {
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
                        document.getElementById("nombre_doctor").value = data.nombre_doctor;
                        document.getElementById("especialidad").value = data.especialidad;
                        document.getElementById("submitDoctorForm").dataset.id = id;
                    } else {
                        alert("Error al cargar los datos del doctor.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteDoctor").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/doctor.controller.php?op=eliminar&id=${id}`, {
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
                        alert("Doctor eliminado exitosamente!");
                        location.reload();
                    } else {
                        alert("Error al eliminar el doctor.");
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
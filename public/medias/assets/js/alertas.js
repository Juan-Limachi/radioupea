// import axios from 'axios';

function confirmarEliminarUsuario(id) {
    Swal.fire({
        title: "Eliminar Usuario",
        text: "¿Estás seguro de que deseas eliminar al usuario? .",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se ha eliminado al usuario exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/eliminarUsuario/${id}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizo la eliminacion del usuario.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function confirmarRestablecerCredenciales(id) {
    Swal.fire({
        title: "Restablecer Credenciales",
        text: "¿Estás seguro de que deseas restablecer las credenciales?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, restablecer",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Credenciales restablecidas exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/restablecerCredenciales/${id}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizaron cambios en las credenciales.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function confirmarActivarUsuario(id) {
    Swal.fire({
        title: "Activar Usuario",
        text: "¿Estás seguro de que deseas actibar el usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, activar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se ha activado al usuario exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/activarUsuario/${id}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizo la activacion del usuario.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function confirmarGuardarDatos() {
    Swal.fire({
        title: "Guardar Datos",
        text: "¿Estás seguro de que deseas guardar los datos?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, guardar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, mostrar el SweetAlert de éxito y enviar el formulario
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "¡Tus datos han sido guardados!",
                showConfirmButton: false,
                timer: 1500,
            });
            // Aquí deberías agregar la lógica para enviar el formulario
            document.getElementById("tuFormulario").submit();
        }
    });
}

function mostrarNoticia(titulo, nota, portada, formato) {
    if (formato == "IMAGEN") {
        Swal.fire({
            title: titulo,
            text: nota,
            imageUrl: portada,
            imageWidth: 480,
            imageHeight: 280,
            imageAlt: "Imagen",
        });
    } else {
        Swal.fire({
            title: titulo,
            html: `<video width="450px" preload="metadata" controls muted>
            <source src="${portada}"></video><p>${nota}</p>`,
            focusConfirm: false,
        });
    }
}

function confirmarEliminarIntegrante(id_int) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esto.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se ha eliminado al integrante exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/eliminarIntegrante/${id_int}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizo la eliminacion del integrante.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function confirmarEliminarPrograma(id_pro) {
    Swal.fire({
        title: "¿Estás seguro de eliminar el programa?",
        text: "No podrás revertir esto.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se ha eliminado el programa exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/eliminarPrograma/${id_pro}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizo la eliminacion del programa.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function confirmarEliminarNoticia(id_not) {
    Swal.fire({
        title: "¿Estás seguro eliminar la noticia?",
        text: "No podrás revertir esto.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se ha eliminado la noticia exitosamente.",
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.href = `/eliminarNoticia/${id_not}`;
            }, 1400);
        } else {
            Swal.fire({
                icon: "error",
                title: "Operación cancelada",
                text: "No se realizo la eliminacion de la noticia.",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

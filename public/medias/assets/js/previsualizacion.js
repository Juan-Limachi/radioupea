var selectedFile = null;

function handleFileChange(event) {
    var fileInput = event.target;
    if (fileInput.files.length > 0) {
        selectedFile = fileInput.files[0];
        document.getElementById("fileCambiado").value = "1";
        previewFile(selectedFile);
    } else {
        selectedFile = null;
        document.getElementById("fileCambiado").value = "0";
    }
}

function previewFile(file) {
    var reader = new FileReader();
    reader.onload = function () {
        var filePreviewContainer = document.getElementById(
            "filePreviewContainer"
        );
        var filePreview = document.getElementById("filePreview");
        if (file.type.startsWith("image")) {
            // Cambiar a una etiqueta de imagen
            filePreviewContainer.innerHTML =
                '<img id="filePreview" width="350" class="rounded mx-auto d-block" src="' +
                reader.result +
                '" alt="">';
            // Actualizar el valor del select
            document.getElementById("formato").value = "IMAGEN";
        } else if (file.type.startsWith("video")) {
            // Cambiar a una etiqueta de video
            filePreviewContainer.innerHTML =
                '<video id="filePreview" class="rounded mx-auto d-block" width="350" height="260" preload="metadata" controls muted src="' +
                reader.result +
                '"></video>';
            // Actualizar el valor del select
            document.getElementById("formato").value = "VIDEO";
        }
    };
    reader.readAsDataURL(file);
}

var selectedFileIntegrante = null;

function handleImageChange(event) {
    var fileInput = event.target;
    if (fileInput.files.length > 0) {
        selectedFileIntegrante = fileInput.files[0];
        document.getElementById("imagen_cambiada").value = "1"; // Marcar que se ha cambiado la imagen
        previewImageIntegrante(event); // Llamar a la función previewImageIntegrante para mostrar la vista previa de la imagen
    } else {
        selectedFileIntegrante = null;
        document.getElementById("imagen_cambiada").value = "0"; // Marcar que no se ha cambiado la imagen
    }
}

function previewImageIntegrante(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var image = document.getElementById("imagen-preview");
        image.src = reader.result;
    };
    reader.readAsDataURL(selectedFileIntegrante);
}

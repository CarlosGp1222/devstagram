import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube tu imagen aqui",    
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar Imagen",
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );
            imagenPublicada.previewElement.classList.add("dz-success","dz-complete");
        }
    },
    // maxFilesize: 256, // MB
    // url: "/upload", 
    // headers: {
    //     "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
    //         .content
    // }
});



dropzone.on("success", function(file, res) {
    document.querySelector('[name="imagen"]').value = res.imagen;
});



dropzone.on("removedfile", function() {
    document.querySelector('[name="imagen"]').value = '';
});
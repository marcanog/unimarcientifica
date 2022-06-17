//data picker
$(function () {
    $("#datepicker").datepicker({
        format: "dd/mm/yyyy",
        orientation: "bottom",
    });
});

//summernote scripts
$("#summernote_spanish").summernote({
    placeholder: "Resumen del Artículo",
    tabsize: 2,
    height: 200,
});
$("#summernote_english").summernote({
    placeholder: "Resume of the Article",
    tabsize: 2,
    height: 200,
});

/*informacion del autor*/
$("#summernote_author_spanish").summernote({
    placeholder: "Informacion del Autor",
    tabsize: 2,
    height: 200,
});
$("#summernote_author_english").summernote({
    placeholder: "Informacion del Autor",
    tabsize: 2,
    height: 200,
});

/*area de informacion*/
$("#summernote_information").summernote({
    placeholder: "Información a publicar",
    tabsize: 2,
    height: 200,
});
$("#summernote_information_english").summernote({
    placeholder: "Información a publicar",
    tabsize: 2,
    height: 200,
});

/*textbox descripcion de las ediciones*/
$("#summernote_edition_description").summernote({
    placeholder: "Descripción de la edición",
    tabsize: 2,
    height: 200,
});
$("#summernote_edition_description_en").summernote({
    placeholder: "Description of the edition",
    tabsize: 2,
    height: 200,
});

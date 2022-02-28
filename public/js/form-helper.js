function setIdFields(id, action) {
    var input = ' ',
        ids = document.getElementById('ids');

    if (action == "edit")
        ids = document.getElementById('ids');

    switch (id) {
        case '1':
            input = '<input type="text" id="id_number" name="id_number" placeholder="BI" maxlength="13" minlength="13">';
            break;
        case '2':
            input = '<input type="text" id="id_number" name="id_number" placeholder="NUIT" maxlength="9" minlength="9">';
            break;
        case '3':
            input = '<input type="text" id="id_number" name="id_number" placeholder="Passaporte" maxlength="" minlength="">';
            break;
        default:
            input = '<input type="text" id="id_number" class="form-control" id="id_number" name="id_number" placeholder="Numero de Documento" readonly>';
            break;
    }
    ids.innerHTML = input;
}
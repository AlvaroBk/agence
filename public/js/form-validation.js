const emailRegex = RegExp(
    /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
);

const phoneRegex = RegExp(
    /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
);

const plateRegex = RegExp(/([A-Z]){3}-((\d{3}-(MC|MP|IB|GZ|MN|SF|TT|ZZ|NP|CD|NS))|(\d{2}-\d{2}))/g);
/*/([a-zA-Z]){3}-(\d{3}|\d{2}-\d{2})*$/g*/

const areaRegex = RegExp(/^\d+$/gs);

function format(input, format, sep) {
    var output = "";
    var idx = 0;
    for (var i = 0; i < format.length && idx < input.length; i++) {
        output += input.substr(idx, format[i]);
        if (idx + format[i] < input.length) output += sep;
        idx += format[i];
    }

    output += input.substr(idx);

    return output;
}

function validateLogin(event) {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var btn = document.querySelector("#btn");

    const { name, value } = event.target;

    switch (name) {
        case "email":
            email = emailRegex.test(value) &&
                value !== "" ? "" :
                "invalid email address";
            document.getElementById("errorLoginEmail").innerHTML = email;
            break;
        case "password":
            password =
                value.length < 6 && value !== "" ? "minimum 6 characaters required" : "";
            document.getElementById("errorLoginPass").innerHTML = password;
            break;
        default:
            break;
    }

    if (email != "" && password != "") {
        btn.disabled = true;
    } else
        btn.disabled = false;
}

function validateAddUser(event) {
    var fname = '',
        lname = '',
        email = '',
        phone_number = '',
        address = '';

    var btn = document.getElementById("add_next_confirm");

    const { name, value } = event.target;

    switch (name) {
        case "name":
            fname =
                value.length < 3 && value !== "" ? "minimo de 3 caracaters necessarios" : "";
            document.getElementById("errorSignUpFname").innerHTML = fname;
            break;
        case "surname":
            lname =
                value.length < 3 && value !== "" ? "minimo de 3 caracaters necessarios" : "";
            document.getElementById("errorSignUpLname").innerHTML = lname;
            break;
        case "email":
            email = emailRegex.test(value) &&
                value !== "" ? "" :
                "email invalido";
            document.getElementById("errorSignUpEmail").innerHTML = email;
            break;
        case "phone_number":
            phone_number =
                value.length < 6 && value !== "" ? "Numero de celular invalido" : "";
            document.getElementById("errorSignUpPhone_number").innerHTML = phone_number;
            break;
        case "address":
            address =
                value.length < 6 && value !== "" ? "Endereço invalido!\nminimo 10 caracaters necessarios" : "";
            document.getElementById("errorSignUpAddress").innerHTML = address;
            break;
        default:
            break;
    }
    if (fname != "" && lname != "" && email != "" && phone_number != "" && address != "") {
        //btn.disabled = true;
    } else {
        //btn.disabled = false;
    }
}

function validateAddCompany(event, type) {
    var company_name = '',
        president = '',
        email = '',
        vat = '',
        address = '',
        logo = '';

    const { name, value } = event.target;

    switch (name) {
        case "name":
            company_name =
                value.length < 3 && value !== "" ? "minimo de 3 caracaters necessarios" : "";
            if (type == "add")
                document.getElementById("errorSignUpCompanyName").innerHTML = company_name;
            else
                document.getElementById("errorEditCompanyName").innerHTML = company_name;
            break;
        case "president":
            president =
                value.length < 3 && value !== "" ? "minimo de 3 caracaters necessarios" : "";
            if (type == "add")
                document.getElementById("errorSignUpCompanyPresident").innerHTML = president;
            else
                document.getElementById("errorEditCompanyPresident").innerHTML = president;
            break;
        case "email":
            email = emailRegex.test(value) &&
                value !== "" ? "" :
                "email invalido";
            if (type == "add")
                document.getElementById("errorSignUpCompanyEmail").innerHTML = email;
            else
                document.getElementById("errorEditCompanyEmail").innerHTML = email;
            break;
        case "vat":
            vat =
                value.length < 9 && value !== "" ? "VAT invalido" : "";
            if (type == "add")
                document.getElementById("errorSignUpCompanyVat").innerHTML = vat;
            else
                document.getElementById("errorEditCompanyVat").innerHTML = vat;
            break;
        case "address":
            address =
                value.length < 6 && value !== "" ? "Endereço invalido!\nminimo 10 caracaters necessarios" : "";
            if (type == "add")
                document.getElementById("errorSignUpCompanyAddress").innerHTML = address;
            else
                document.getElementById("errorEditCompanyAddress").innerHTML = address;
            break;
        case "logo":
            logo = "Tipo de ficheiro invalido!";

            if (event.target.files[0].type.match(/image.*/)) {
                logo = "";
                var reader = new FileReader();
                reader.onload = function(event) {
                    document.querySelector('#logoDisplay').setAttribute('src', event.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                if (type == "add")
                    document.getElementById("errorSignUpCompanyLogo").innerHTML = logo;
                else
                    document.getElementById("errorEditCompanyLogo").innerHTML = logo;
            }
            break;
        default:
            break;
    }
}

$('#plate_number').keyup(function() {
    var error;
    var foo = $(this).val().replace(/\-/g, ''); // remove hyphens
    // You may want to remove all non-digits here
    // var foo = $(this).val().replace(/\D/g, "");

    if (foo.length > 0) {
        if (foo.length > 7)
            foo = format(foo, [3, 3], '-');
        else
            foo = format(foo, [3, 2], '-');
    }
    $(this).val(foo);

    error = plateRegex.test(foo.toUpperCase()) && foo !== "" ? "" : "Matricula Invalida";
    document.getElementById("errorPlateNumber").innerHTML = error;
});


function validateCcKg(value) {
    var error = value.length < 3 && value !== "" ? "minimo de 3 caracaters necessarios" : "";
    document.getElementById("errorCcKg").innerHTML = error;
}

function validateEmail(value) {
    error = emailRegex.test(value) && value !== "" ? "" : "email invalido";
    document.getElementById("errorEmail").innerHTML = error;
}

function validateAddress(value) {
    var error = value.length < 10 && value !== "" ? "minimo de 10 caracaters necessarios" : "";
    document.getElementById("errorAddress").innerHTML = error;
}

function validateName(value) {
    var error = value.length < 2 && value !== "" ? "minimo de 2 caracaters necessarios" : "";
    document.getElementById("errorName").innerHTML = error;
}

function validateIpraDetails(event) {
    var areaCc = document.getElementById('areaCc').value;
    var areaCl = document.getElementById('areaCl').value;
    var area_terrenoc1 = document.getElementById('area_terrenoc1').value;
    var area_terrenoc2 = document.getElementById('area_terrenoc2').value;
    var area_terrenol1 = document.getElementById('area_terrenol1').value;
    var area_terrenol2 = document.getElementById('area_terrenol2').value;
    var areaC1 = "",
        areaC2 = "";

    var btn = document.getElementById("add_next_confirm");

    const { name, value } = event.target;

    switch (name) {
        case "area_constr1":
            if (area_terrenoc1 < areaCc || area_terrenoc2 < areaCl || area_terrenol1 < areaCc || area_terrenol2 < areaCl) {
                areaC1 = "Não pode ser maior que area do terreno";
                document.getElementById("errorAreaC1").innerHTML = areaC1;

            } else {
                areaC1 = "";
                document.getElementById("errorAreaC1").innerHTML = areaC1;
            }

            break;

        case "area_constr2":
            if (area_terrenoc1 < areaCc || area_terrenoc2 < areaCl || area_terrenol1 < areaCc || area_terrenol2 < areaCl) {
                areaC2 = "Não pode ser maior que area do terreno";
                document.getElementById("errorAreaC2").innerHTML = areaC2;
            } else {
                areaC2 = "";
                document.getElementById("errorAreaC2").innerHTML = areaC2;
            }

        case "email":
            email = emailRegex.test(value) &&
                value !== "" ? "" :
                "email invalido";
            document.getElementById("errorSignUpEmail").innerHTML = email;
            break;
        case "phone_number":
            phone_number =
                value.length < 6 && value !== "" ? "Numero de celular invalido" : "";
            document.getElementById("errorSignUpPhone_number").innerHTML = phone_number;
            break;
        case "address":
            address =
                value.length < 6 && value !== "" ? "Endereço invalido!\nminimo 10 caracaters necessarios" : "";
            document.getElementById("errorSignUpAddress").innerHTML = address;
            break;
        default:
            break;
    }
    if (fname != "" && lname != "" && email != "" && phone_number != "" && address != "") {
        //btn.disabled = true;
    } else {
        //btn.disabled = false;
    }
}
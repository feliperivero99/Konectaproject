<script type="text/javascript">
$(document).ready(function() {
    $('#docucheck').hide();
    $('#namencheck').hide();
    $('#emailcheck').hide();
    $('#direccheck').hide();
   


    let docuError = true;
    let userError = true;
    let nameError = true;
    let apeError = true;
    let emailError = true;
    let passwordError = true;
    let confirpasswordError = true;
    let rolworddError = true;


    function validateRol() {

        var e3 = document.getElementById("rol");
        var strUser3 = e3.options[e3.selectedIndex].value;
        console.log(strUser3);
        if (strUser3 == 0 || strUser3 == "0") {
            $('#rolwordcheck').show();
            rolworddError = false;
            return false;


        }

    }

    function validateConfirPassword() {
        let usernameValue = $('#confirpassword').val();
        $('#confirpasswordcheck').hide();
        if (usernameValue.length == '') {
            $('#confirpasswordcheck').show();
            confirpasswordError = false;
            return false;
        }
    }

    function validatePassword() {
        let usernameValue = $('#password').val();
        $('#passwordcheck').hide();
        if (usernameValue.length == '') {
            $('#passwordcheck').show();
            passwordError = false;
            return false;
        }
    }

    function validateApe() {
        let usernameValue = $('#email').val();
        $('#emailcheck').hide();
        apeError = true;
        if (usernameValue.length == '') {
            $('#emailcheck').show();
            apeError = false;
            return false;
        }
    }


    function validateNames() {
        let usernameValue = $('#Nombres').val();
        $('#namencheck').hide();
        nameError = true;
        if (usernameValue.length == '') {
            $('#namencheck').show();
            nameError = false;
            return false;
        }
    }


    function validateUsername() {
        let usernameValue = $('#direccion').val();
        $('#direccheck').hide();
        userError = true;
        if (usernameValue.length == '') {
            $('#direccheck').show();
            userError = false;
            return false;
        }
    }

    function validateDocu() {
        let usernameValue = $('#documento').val();
        $('#docucheck').hide();
        docuError = true;
        if (usernameValue.length == '') {
            $('#docucheck').show();
            docuError = false;
            return false;
        }
    }

    // Validate Email
    const email =
        document.getElementById('email');
    email.addEventListener('blur', () => {
        let regex =
            /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let s = email.value;
        if (regex.test(s)) {
            email.classList.remove(
                'is-invalid');
            emailError = true;
            $('#emailcheck').hide();
        } else {
            email.classList.add(
                'is-invalid');
            emailError = false;
            $('#emailcheck').show();
        }
    })


    $('#submitbtn').click(function() {
        validateDocu();
        validateNames();
        validateUsername();
        validateApe() ;
       

            


        if ((emailError == true) &&
            (docuError == true) &&
            (rolworddError == true) &&
            (confirpasswordError == true) &&
            (passwordError == true) &&
            (apeError == true) &&
            (nameError == true) &&
            (docuError == true)) {

    


            return true;
        } else {
            //alert("nofunciona");
            return false;
        }

    });




});
</script>
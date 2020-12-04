<script type="text/javascript">
$(document).ready(function() {
    $('#docucheck').hide();
    $('#userncheck').hide();
    $('#namencheck').hide();
    $('#apecheck').hide();
    $('#emailcheck').hide();
    $('#passwordcheck').hide();
    $('#confirpasswordcheck').hide();
    $('#rolwordcheck').hide();
    $('#confirequlcheck').hide();
    $('#confirequlcheck2').hide();



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
        let usernameValue = $('#Apellidos').val();
        $('#apecheck').hide();
        if (usernameValue.length == '') {
            $('#apecheck').show();
            apeError = false;
            return false;
        }
    }


    function validateNames() {
        let usernameValue = $('#Nombres').val();
        $('#namencheck').hide();
        if (usernameValue.length == '') {
            $('#namencheck').show();
            nameError = false;
            return false;
        }
    }


    function validateUsername() {
        let usernameValue = $('#username').val();
        $('#userncheck').hide();
        if (usernameValue.length == '') {
            $('#userncheck').show();
            userError = false;
            return false;
        }
    }

    function validateDocu() {
        let usernameValue = $('#documento').val();
        $('#docucheck').hide();
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
        validateRol();

        

        @if($edit == 0)
        validateConfirPassword();
        validatePassword();
        @endif


        validateApe();
        validateNames();
        validateUsername();

    


        if ((emailError == true) &&
            (docuError == true) &&
            (rolworddError == true) &&
            (confirpasswordError == true) &&
            (passwordError == true) &&
            (apeError == true) &&
            (nameError == true) &&
            (docuError == true)) {

            @if($edit == 0)
            if ($('#confirpassword').val() != $('#password').val()) {
                $('#confirequlcheck').show();
                return false;

            }

            @endif

            @if($edit == 1)
            if ($('#confirpassword').val() != "" || $('#password').val() != "") {
                if ($('#confirpassword').val() != $('#password').val()) {
                    $('#confirequlcheck2').show();
                    return false;

                }

            }

            @endif

            return true;
        } else {
            //alert("nofunciona");
            return false;
        }

    });




});
</script>
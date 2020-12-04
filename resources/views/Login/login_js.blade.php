<script type="text/javascript">
$(document).ready(function() {
    $('#usercheck').hide();
    $('#passcheck').hide();
    let usernameError = true;
    let passwordError = true;

    function validateUsername() {
        let usernameValue = $('#idusername').val();
        $('#usercheck').hide();
        if (usernameValue.length == '') {
            $('#usercheck').show();
            usernameError = false;
            return false;
        }
    }

    function validatePassword() {
        let passwrdValue =
            $('#password').val();
        $('#passcheck').hide();
        if (passwrdValue.length == '') {
            $('#passcheck').show();
            passwordError = false;
            return false;
        }

    }

    // Validate Email 
    const email =
        document.getElementById('idusername');
    email.addEventListener('blur', () => {
        let regex =
            /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let s = email.value;
        if (regex.test(s)) {
            email.classList.remove(
                'is-invalid');
            usernameError = true;
            $('#usercheck').hide();
        } else {
            email.classList.add(
                'is-invalid');
            usernameError = false;
            $('#usercheck').show();
        }
    })


    $('#submitbtn').click(function() {
        validateUsername();
        validatePassword();

        if ((usernameError == true) &&
            (passwordError == true)) {
            return true;
        } else {
            //alert("nofunciona");
            return false;
        }

    });




});



</script>
<?php
    function echoSignInForm() {
        echo '
            <form name="auth_form" method="post" action="admin/login/auth.php">
                <table>
                    <tr>
                        <td>Name:</td><br>
                        <td>
                            <input type="text" name=userid pattern="[a-zA-z0-9]+" required>
                        </td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td>
                            <input type="password" value="" name=password required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Sign in">
                        </td>
                    </tr>
                </table>
            </form>
        ';
    }
?>

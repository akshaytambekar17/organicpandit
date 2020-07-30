<html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td><p> Hi <?= $arrUserDetails['fullname'] ?>, </p></td>
                </tr>
                <tr>
                    <td>
                        <p>You recently requested to reset your password for you Organic Pandit account.</p> <br>
                        <p>Please use the below password for login into your account.</p> <br>
                        <p><b>Password : </b> <?= $strRandomString; ?>.</p>
                        <p><b>Note : </b> Make sure that after login please change the password.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

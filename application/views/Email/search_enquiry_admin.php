<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td><p style="Margin-bottom: 0;"> Hi Admin, </p></td>
                </tr>
                <tr>
                    <td>
                        <p>New enquiry to user. Please follow the details</p>
                        <p>Sender Details</p>
                        <p><b>Name : </b> <?= $arrmixPostData['fullname']; ?>.</p>
                        <p><b>Email Id : </b> <?= $arrmixPostData['email'] ?>.</p>
                        <p><b>Mobile Number : </b> <?= $arrmixPostData['mobile_no'] ?>.</p>
                        <p><b>Description : </b> <?= $arrmixPostData['description'] ?>.</p>
                        <br>
                        <p>Receiver Details</p>    
                        <p><b>Name : </b> <?= $arrmixUserDetails['fullname']; ?>.</p>
                        <p><b>User Type : </b> <?= $arrmixUserDetails['user_type_name']; ?>.</p>
	            </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

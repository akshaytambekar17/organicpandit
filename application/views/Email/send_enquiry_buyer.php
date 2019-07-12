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
                    <td><p style="Margin-bottom: 0;"> Hi <?= $strBuyerName; ?>, </p></td>
                </tr>
                <tr>
                    <td>
                        <p>Please find details which has been sent to seller</p>
                        <p><b>Seller Name : </b> <?= $strSellerName; ?>.</p>
	                    <p><b>Category : </b> <?= $arrSellProductDetails['category_name'] ?>.</p>
	                    <p><b>Product : </b> <?= $arrSellProductDetails['product_name'] ?>.</p>
                        <p><b>Quantity (in Kg) : </b> <?= $arrSellProductDetails['sell_quantity']?>.</p>
                        <p><b>Expected Price (per Kg) : </b> <?= $arrSellProductDetails['price']?>.</p>
                        <p><b>Total Price : </b> <?= $arrSellProductDetails['total_price']?>.</p>
	                    <p><b>Description : </b> <?= $description; ?>.</p>
	                </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

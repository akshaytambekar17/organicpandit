<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoicesController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Invoices List';
        $arrData['title'] = 'Invoices List';
        $arrData['strHeading'] = 'Invoices List';
        $arrData['view'] = 'invoice/list';
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrInvoicesList'] = $this->Invoices->getInvoices();
        } else {
            $arrData['arrInvoicesList'] = $this->Invoices->getInvoiceByUserId( $this->arrUserSession['user_id'] );
        }    
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrOrdersList'] = $this->Orders->getOrdersByOrderPaymentStatus( ORDER_PAYMENT_STATUS_COMPLETED );
        $arrData['arrInvoicesList'] = $this->Invoices->getInvoices();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Invoice';
        $arrData['title'] = 'Add Invoice';
        $arrData['strHeading'] = 'Add Invoice';
        $arrData['strSubmitValue'] = 'Add Invoice';
        $arrData['view'] = 'invoice/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( true == $this->form_validation->run( 'invoices-form' ) ) {
                
                $arrDetails = $arrPost;
                unset( $arrDetails['submit'] );
                unset( $arrDetails['order_number'] );
                if( false == isset( $arrDetails['is_send_mail'] ) ) {
                    $arrDetails['is_send_mail'] = 1;
                }
                $intInvoiceId = $this->Invoices->insert( $arrDetails );
                if( true == isIdVal( $intInvoiceId ) ) {
                    if( ENABLED == $arrDetails['is_send_mail'] ) {
//                        $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $arrPost['order_id'] );
//                        $arrobjCartProductList = json_decode( $arrmixOrderDetails['product_details'] );
//                        $arrmixCartProductList = getCartProductDataWithBoolCartOrderType( $arrobjCartProductList );
//                        $arrOrderData['arrmixOrderDetails'] = $arrmixOrderDetails;
//                        $arrOrderData['arrmixCartProductList'] =  $arrmixCartProductList;
//                        $strMessage = $this->load->view( 'Email/invoice', $arrOrderData, TRUE );
//                        $strTo = ADMINEMAILID;
//                        $strSubject = "Invoice for the order " . $arrPost['order_number'];
//                        $this->sendEmail( $strTo, $strSubject, $strMessage );
                                
                        $this->session->set_flashdata( 'Message', 'Invoice has been created succesfully for order ' . $arrPost['order_number'] . ', but mail canot send. Something went wrong with the configuration. ' );
                    } else {
                        $this->session->set_flashdata( 'Message', 'Invoice has been created succesfully for order' . $arrPost['order_number'] );
                    }
                    $arrUpdateData = array(
                                        'invoice_number' => 'INVOICENO' . $intInvoiceId . $arrDetails['order_id'],
                                        'invoice_id' => $intInvoiceId,
                                    );
                    $this->Invoices->update( $arrUpdateData );
                    
                    return redirect( 'admin/invoices', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to create Invoice' );
                    $this->backendLayout( $arrData );
                }
            } else {
                $this->backendLayout( $arrData );
            }    
            
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function update() {
        $arrGet = $this->input->get();

        $arrInvoiceDetails = $this->Invoices->getInvoiceByInvoiceId( $arrGet['invoice_id'] );
        if( false == isArrVal( $arrInvoiceDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Invoice not found.' );
            redirect( 'admin/invoices', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrInvoiceDetails'] = $arrInvoiceDetails;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrInvoiceDetails'] = $arrInvoiceDetails;
        $arrData['strTitle'] = 'Update Invoice ' . $arrInvoiceDetails['invoice_number'];
        $arrData['title'] = 'Update Invoice ' . $arrInvoiceDetails['invoice_number'];
        $arrData['strHeading'] = 'Update Invoice ' . $arrInvoiceDetails['invoice_number'];
        $arrData['strSubmitValue'] = 'Update Invoice';
        $arrData['view'] = 'invoice/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            if( true == $this->form_validation->run( 'invoices-form' ) ) {
                
                $arrDetails = $arrPost;
                unset( $arrDetails['submit'] );
                unset( $arrDetails['order_number'] );
                if( false == isset( $arrDetails['is_send_mail'] ) ) {
                    $arrDetails['is_send_mail'] = 1;
                }
                $boolResult = $this->Invoices->update( $arrDetails );

                if( true == isVal( $boolResult ) ) {
                    if( ENABLED == $arrDetails['is_send_mail'] ) {
//                        $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $arrPost['order_id'] );
//                        $arrobjCartProductList = json_decode( $arrmixOrderDetails['product_details'] );
//                        $arrmixCartProductList = getCartProductDataWithBoolCartOrderType( $arrobjCartProductList );
//                        $arrOrderData['arrmixOrderDetails'] = $arrmixOrderDetails;
//                        $arrOrderData['arrmixCartProductList'] =  $arrmixCartProductList;
//                        $strMessage = $this->load->view( 'Email/invoice', $arrOrderData, TRUE );
//                        $strTo = ADMINEMAILID;
//                        $strSubject = "Invoice for the order " . $arrPost['order_number'];
//                        $this->sendEmail( $strTo, $strSubject, $strMessage );
                                
                        $this->session->set_flashdata( 'Message', 'Invoice has been updated succesfully for order ' . $arrPost['order_number'] . ', but mail canot send. Something went wrong with the configuration. ' );
                    } else {
                        $this->session->set_flashdata( 'Message', 'Invoice has been updated succesfully for order ' . $arrPost['order_number'] );
                    }
                    return redirect( 'admin/invoices', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Invoice ' );
                    $this->backendLayout( $arrData );
                }
                
            } else {
                $this->backendLayout( $arrData );
            }
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function delete() {
        $arrPost = $this->input->post();
        $boolResult = $this->Invoices->delete( $arrPost['invoice_id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function fetchOrderData() {
        $arrPost = $this->input->post();
        $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $arrPost['order_id'] );
        $arrobjCartProductList = json_decode( $arrmixOrderDetails['product_details'] );
        $arrmixCartProductList = getCartProductDataWithBoolCartOrderType( $arrobjCartProductList );
        $arrData['arrmixOrderDetails'] = $arrmixOrderDetails;
        $arrData['arrmixCartProductList'] =  $arrmixCartProductList;
        echo $this->load->view( 'backend/invoice/fetch-order-data', $arrData );
        
    }
    
}

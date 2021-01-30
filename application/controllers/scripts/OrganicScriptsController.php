<?php

class OrganicScriptsController extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function actionIndex() {
        
        $arrmixUserList = $this->User->getUsersByIsSubscription();
        
        $strFileName = 'logs/scripts/testing_scripts_' . replaceDateTimeDashFormatToUnderscore( CURRENT_DATE ) . '.txt';
        $objFileHandleList = fopen( $strFileName, 'a' );
        $strMessage = PHP_EOL . PHP_EOL ." Cron run at "  . CURRENT_DATETIME;
        fwrite( $objFileHandleList, $strMessage );
        
        if( true == isArrVal( $arrmixUserList ) ) {
            
            $strFileName = 'logs/scripts/organic_scripts_' . replaceDateTimeDashFormatToUnderscore( CURRENT_DATE ) . '.txt';
            foreach( $arrmixUserList as $arrmixUserDetails ) {
                if( strtotime( $arrmixUserDetails['expired_at'] . ' 23:00:00' ) < strtotime( CURRENT_DATETIME ) ) {
                    $arrmixUpdateData = [
                        'user_id' => $arrmixUserDetails['user_id'],
                        'updated_by' => ADMIN_ID,
                        'is_subscription' => NOT_SUBSCRIBED,
                        'is_subscription_expire' => SUBSCRIPTION_EXPIRED,
                    ];
                    
                    $this->User->update( $arrmixUpdateData );
                    
                    $objFileHandleList = fopen( $strFileName, 'a' );
                    $strMessage = PHP_EOL . PHP_EOL ." User " . $arrmixUserDetails['fullname']  . ' subscription expired at ' . CURRENT_DATETIME;
                    fwrite( $objFileHandleList, $strMessage );
                }
            }
        }
    
        echo "Organic Script has successfully run at " . CURRENT_DATETIME;    
    }
    
}

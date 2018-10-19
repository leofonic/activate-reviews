<?php

namespace zunderweb\activate_reviews\Controller\Admin;

use OxidEsales\Eshop\Core\DatabaseProvider;
use oxRegistry;

class NavigationController extends NavigationController_parent
{
    protected function _doStartUpChecks(){
        $aMessage = parent::_doStartUpChecks();
        if (oxRegistry::getConfig()->getConfigParam( 'blGBModerate' )){
            $sSelect = "SELECT count(*) FROM `oxreviews` WHERE `OXACTIVE` = 0";
            $countreviews = DatabaseProvider::getDb()->Getone($sSelect);
            if ($countreviews > 0){
                if (!$aMessage['message']) $aMessage['message'] = '';
                else $aMessage['message'] .= ' ';
                
    			$aMessage['message'] .= '<a style="color:red" href="?cl=z_review&amp;stoken='
                    .$this->getSession()->getSessionChallengeToken()
                    .'" target="basefrm">'
                    .oxRegistry::getLang()->translateString('AR_DASHBOARD_MESSAGE_1')
                    .$countreviews.oxRegistry::getLang()->translateString('AR_DASHBOARD_MESSAGE_2')
                    .'</a>';
			}
        }
	 	return $aMessage;
    }
}
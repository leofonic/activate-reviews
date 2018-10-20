<?php
class activate_reviews_navigation extends activate_reviews_navigation_parent {

    protected function _doStartUpChecks()
    {	
        $aMessage = array ();
        $aMessage = parent::_doStartUpChecks();
        $myConfig = $this->getConfig();
        if ($myConfig->getConfigParam( 'blGBModerate' )){
            $sSelect = "SELECT count(*) FROM `oxreviews` WHERE `OXACTIVE` = 0";
            $rs = oxDb::getDb()->Getone($sSelect);
            if ($rs > 0){
                if (!$aMessage['message']) $aMessage['message'] = '';
                else $aMessage['message'] .= ' ';
                
                $aMessage['message'] .= '<a href="?cl=z_review&amp;stoken='
                .$this->getSession()->getSessionChallengeToken()
                .'" target="basefrm">'
                .oxRegistry::getLang()->translateString('AR_DASHBOARD_MESSAGE_1')
                .$rs
                .oxRegistry::getLang()->translateString('AR_DASHBOARD_MESSAGE_2')
                .'</a>';
            }
        }
        return $aMessage;
    }
}
?>
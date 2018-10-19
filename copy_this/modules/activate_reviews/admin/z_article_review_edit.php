<?php
class z_article_review_edit extends oxAdminDetails
{
    public function render()
    {
        parent::render();
        $myConfig = $this->getConfig();
        $sRevoxId = oxConfig::getParameter( 'oxid' );

        if ( $sRevoxId != "-1" && isset( $sRevoxId)) {

            $this->_aViewData["editlanguage"] = $this->_iEditLang;

            if ( isset( $sRevoxId ) ) {
                $oReview = oxNew( "oxreview" );
                $oReview->load( $sRevoxId );
                $this->_aViewData["editreview"] = $oReview;

                $oUser = oxNew( "oxuser" );
                $oUser->load( $oReview->oxreviews__oxuserid->value);
                $this->_aViewData["user"] = $oUser;
            }
            //show "active" checkbox if moderating is active
            $this->_aViewData["blShowActBox"] = $myConfig->getConfigParam( 'blGBModerate' );

        }
        return "z_article_review_edit.tpl";
    }

    public function save()
    {

        $aParams = oxConfig::getParameter( "editval");
        // checkbox handling
        if ( $this->getConfig()->getConfigParam( 'blGBModerate' ) && !isset( $aParams['oxreviews__oxactive'] ) ) {
            $aParams['oxreviews__oxactive'] = 0;
        }

        $oReview = oxNew( "oxreview" );
        $oReview->load( oxConfig::getParameter( "oxid" ) );
        $oReview->assign( $aParams );
        $oReview->save();
        // for reloading upper frame
        $this->_aViewData["updatelist"] =  "1";
    }

    public function delete()
    {

        $sRevoxId = oxConfig::getParameter( "oxid" );
        $oReview  = oxNew( "oxreview" );
        $oReview->load( $sRevoxId);
        $oReview->delete();
        // for reloading upper frame
        $this->_aViewData["updatelist"] =  "1";
    }
}
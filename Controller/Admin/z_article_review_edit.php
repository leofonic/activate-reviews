<?php

namespace zunderweb\activate_reviews\Controller\Admin;

use OxidEsales\Eshop\Core\DatabaseProvider;
use oxRegistry;
use oxAdminDetails;

class z_article_review_edit extends oxAdminDetails
{
    public function render()
    {
        parent::render();
        $myConfig = $this->getConfig();
        $sRevoxId = oxRegistry::getConfig()->getRequestParameter( 'oxid' );

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

        $aParams = oxRegistry::getConfig()->getRequestParameter( "editval");
        // checkbox handling
        if ( $this->getConfig()->getConfigParam( 'blGBModerate' ) && !isset( $aParams['oxreviews__oxactive'] ) ) {
            $aParams['oxreviews__oxactive'] = 0;
        }

        $oReview = oxNew( "oxreview" );
        $oReview->load( oxRegistry::getConfig()->getRequestParameter( "oxid" ) );
        $oReview->assign( $aParams );
        $oReview->save();
        // for reloading upper frame
        $this->_aViewData["updatelist"] =  "1";
    }

    public function delete()
    {

        $sRevoxId = oxRegistry::getConfig()->getRequestParameter( "oxid" );
        $oReview  = oxNew( "oxreview" );
        $oReview->load( $sRevoxId);
        $oReview->delete();
        // for reloading upper frame
        $this->_aViewData["updatelist"] =  "1";
    }
}
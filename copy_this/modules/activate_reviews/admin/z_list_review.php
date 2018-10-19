<?php
class z_List_Review extends List_Review
{
    public function render()
    {
        parent::render();
        return "z_list_review.tpl";
    }

    protected function _buildSelectString( $oObject = null )
    {
        $sSql = parent::_buildSelectString();

        //Only nonactive Reviews here
        $sSql .= " and oxreviews.oxactive = 0 ";

        return $sSql;
    }

    protected function _prepareOrderByQuery( $sSql = null )
    {
        //set default sorting
        $sSort = oxConfig::getParameter( "sort" );
        if (!$sSort){
            $_GET["sort"] = "oxreviews.oxcreate";
        }
        $sSql = parent::_prepareOrderByQuery($sSql);
        return $sSql;
    }
}
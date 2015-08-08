[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
<script type="text/javascript">
<!--
window.onload = function ()
{
    [{ if $updatelist == 1}]
        top.oxid.admin.updateList('[{ $oxid }]');
    [{ /if}]
}
//-->
</script>
[{ if $readonly }]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="article_review">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="z_article_review_edit">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="editval[article__oxid]" value="[{ $oxid }]">
<input type="hidden" name="voxid" value="[{ $oxid }]">
<input type="hidden" name="oxparentid" value="[{ $oxparentid }]">
<input type="hidden" name="editlanguage" value="[{ $editlanguage }]">

[{ if $editreview }]
  <table cellspacing="0" cellpadding="0" border="0" height="100%" width="100%">
    <tr height="10">
      <td></td><td></td>
    </tr>
    <tr>
      <td width="15"></td>
      <td valign="top" class="edittext">

        <br><br>
        <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ARTICLE_REVIEW_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'"">
        <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ARTICLE_REVIEW_DELETE" }]" onClick="Javascript:document.myedit.fnc.value='delete'""><br>

      </td>
      <!-- Anfang rechte Seite -->
      <td valign="top" class="edittext" align="left" valign="top">
      [{ if $user }]
        <table>
          [{block name="admin_article_review_text"}]
              [{if $blShowActBox}]
              <tr>
                <td class="edittext">[{ oxmultilang ident="ARTICLE_REVIEW_ACTIVE" }] :</td>
                <td class="edittext">
                    <input onclick="document.myedit.fnc.value='save';this.form.submit();" class="edittext" type="checkbox" name="editval[oxreviews__oxactive]" value='1' [{if $editreview->oxreviews__oxactive->value == 1}]checked[{/if}] [{ $readonly }]>
                    [{ oxinputhelp ident="HELP_ARTICLE_REVIEW_ACTIVE" }]
                    <br>
                </td>
              </tr>
              [{else}]
              <tr>
                <td class="edittext">[{ oxmultilang ident="ARTICLE_REVIEW_ACTIVE" }] :</td>
                <td class="edittext">
                    <b>[{ oxmultilang ident="AR_NO_MODERATING" }]</b>
                </td>
              </tr>
              [{/if}]
              <tr>
                <td class="edittext">[{ oxmultilang ident="ARTICLE_REVIEW_POSTEDFROM" }]</td>
                <td class="edittext">[{ $user->oxuser__oxfname->value}] [{ $user->oxuser__oxlname->value}]</td>
              </tr>
              <tr>
                <td class="edittext" valign="top">[{ oxmultilang ident="ARTICLE_REVIEW_TEXT" }]</td>
                <td class="edittext">
                  <textarea class="editinput" cols="100" rows="15" wrap="VIRTUAL" name="editval[oxreviews__oxtext]">[{$editreview->oxreviews__oxtext->value}]</textarea>
                  [{ oxinputhelp ident="HELP_ARTICLE_REVIEW_TEXT" }]
                  <br>
                </td>
              </tr>
          [{/block}]
        </table>
      [{/if}]
      </td>
    <!-- Ende rechte Seite -->
    </tr>
  </table>
</form>
[{/if}]
[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
{html_style}
.graphicalCheckbox {
  font-size:16px;
  line-height:16px;
}

.graphicalCheckbox + input {
  display:none;
}
{/html_style}

{footer_script}
jQuery('#pn-config input[type=checkbox]').change(function() {
  jQuery(this).prev().toggleClass('icon-check icon-check-empty');
});
{/footer_script}

<!-- Show the title of the plugin -->
<div class="titlePage">
 <h2>{'Protect Notification'|@translate}</h2>
</div>

<!-- Show settings in a nice box -->
<form method="post" action="" class="properties" id="pn-config">
  <fieldset>
    <legend>{'Configuration'|translate}</legend>
    <ul>
      <li>
        <label>
          <b>{'Email address to replace webmaster email with:'|translate}</b>
          <input type="text" name="replacementEmail" value="{$ProtectNotification.replacementEmail|escape}">
        </label>
      </li>
      <li>
        <label>
          <span class="graphicalCheckbox icon-check{if not $ProtectNotification.hideContactFooter}-empty{/if}"></span>
          <input type="checkbox" name="hideContactFooter"{if $ProtectNotification.hideContactFooter} checked="checked"{/if}>
          <b>{'Hide webmaster email in web footer:'|translate}</b>
        </label>
      </li>
    </ul>
  </fieldset>

  <p class="formButtons"><input type="submit" name="save_config" value="{'Save Settings'|translate}"></p>
</form>

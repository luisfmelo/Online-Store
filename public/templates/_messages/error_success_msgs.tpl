{if $SUCCESS_MESSAGE != ''}
  <div class='successMsg' style='display:none'>
    <i class='fa fa-check' aria-hidden='true'></i> {$SUCCESS_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}
{if $ERROR_MESSAGE != ''}
  <div class='errorMsg' style='display:none'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> {$ERROR_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}
{if $INFO_MESSAGE != ''}
  <div class='infoMsg' style='display:none'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> {$INFO_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}

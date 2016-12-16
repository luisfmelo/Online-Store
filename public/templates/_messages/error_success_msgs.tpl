{if $ERROR_MESSAGE != ''}
  <div class='errorMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> {$ERROR_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}
{if $SUCCESS_MESSAGE != ''}
  <div class='successMsg'>
    <i class='fa fa-check' aria-hidden='true'></i> {$SUCCESS_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}
{if $INFO_MESSAGE != ''}
  <div class='infoMsg'>
    <i class='fa fa-exclamation-circle' aria-hidden='true'></i> {$INFO_MESSAGE}
    <a class="close" href="#">X</a>
  </div>
{/if}

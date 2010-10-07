<?php
class Default_StaticContentSuccessView extends WebfeaturesDefaultBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    return $this->createForwardContainer(
     AgaviConfig::get('actions.error404_module'), 
     AgaviConfig::get('actions.error404_action'));
  }
}
?>

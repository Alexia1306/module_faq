<?php
class module_faqdisplayModuleFrontController extends ModuleFrontController
{
  public function initContent()
  {
    parent::initContent();
    $this->setTemplate('module:module_faq/views/templates/front/display.tpl');
  }
}

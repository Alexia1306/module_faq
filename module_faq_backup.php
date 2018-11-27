<?php
if (!defined('_PS_VERSION_'))
{
  exit;
}

class Module_Faq extends Module
{
    public function __construct()
    {
        $this->name = 'module_faq';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Alex';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('FAQ');
        $this->description = $this->l('Foire Aux Questions.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    }

    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);

      return parent::install() &&
        $this->registerHook('footer') &&
        Configuration::updateValue('MODULE_FAQ_NAME', 'my friend');
      }
    }

    public function uninstall()
    {
        if (!parent::uninstall())
            return false;

        return true;
    }

    public function hookDisplayFooter($params)
    {
        $this->context->smarty->assign(
          array(
              'module_faq_name' => Configuration::get('MODULE_FAQ_NAME'),
              'module_faq_link' => $this->context->link->getModuleLink('module_faq', 'display')
          )
      );
      return $this->display(__FILE__, 'module_faq.tpl');
    }

    public function hookDisplayRightColumn($params)
    {
      return $this->hookDisplayLeftColumn($params);
    }

    public function hookDisplayHeader()
    {
      $this->context->controller->addCSS($this->_path.'css/module_faq.css', 'all');
    }
}

<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class SuperDescriptions extends Module
{
    public function __construct()
    {
        $this->name = 'superdescriptions';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Łukasz Janeczko';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Super Descriptions');
        $this->description = $this->l('Module to change product descriptions based on selected combination.');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('actionProductUpdate');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS($this->_path . 'views/js/superdescriptions.js');
        Media::addJsDef(array('ajaxurl' => $this->context->link->getModuleLink('superdescriptions', 'ajaxsuperdescriptions')));
    }

    public function hookActionProductUpdate($params)
    {
        // Clear cache or any other necessary actions after product update
    }
}
<?php
class SuperDescriptionsAjaxSuperDescriptionsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->ajax = true;
    }

    public function displayAjax()
    {
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');

        $sql = new DbQuery();
        $sql->select('description, description_short');
        $sql->from('dfc_product_attribute_lang');
        $sql->where('id_product_attribute = ' . (int)$id_product_attribute);

        $result = Db::getInstance()->getRow($sql);

        if ($result) {
            $this->ajaxDie(json_encode(array(
                'success' => true,
                'description' => $result['description'],
                'description_short' => $result['description_short']
            )));
        } else {
            $this->ajaxDie(json_encode(array('success' => false)));
        }
    }
}
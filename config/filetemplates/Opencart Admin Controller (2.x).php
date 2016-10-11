<?php
class ControllerModule$module_name extends Controller {
	private ${DS}error = array();

	public function index() {
		${DS}this->load->language('$module_name');

		${DS}this->document->setTitle(${DS}this->language->get('heading_title'));

	 ${DS}this->getList();
	}

	protected function validate() {
		if (!${DS}this->user->hasPermission('modify', '$module_name')) {
			${DS}this->error['warning'] = ${DS}this->language->get('error_permission');
		}

		return !${DS}this->error;
	}
	
	 public function install()
    {
        ${DS}this->load->model('setting/setting');
        ${DS}this->db->query("
INSERT INTO " . DB_PREFIX . "setting (
`setting_id` ,
`store_id` ,
`code` ,
`key` ,
`value` ,
`serialized`
)
VALUES (
NULL , '0', 'ebay_orders', '$module_name _status', '1', '0'
);
");
}

    public function uninstall()
    {
        ${DS}this->db->query("
DELETE FROM " . DB_PREFIX . "setting
WHERE `code` = '$module_name'
");
    }
    
     public function add()
    {
       ${DS}this->load->language('$module_name');

        ${DS}this->document->setTitle(${DS}this->language->get('heading_title'));

        ${DS}this->load->model('$module_name');


        if ((${DS}this->request->server['REQUEST_METHOD'] == 'POST') && ${DS}this->validateForm()) {
            
          
            ${DS}this->response->redirect(${DS}this->url->link('$module_name', 'token=' . ${DS}this->session->data['token'] , 'SSL'));
        }

        ${DS}this->getForm();
    }
    
     protected function getForm()
    {
		
		  ${DS}this->response->setOutput(${DS}this->load->view('$module_name _list.tpl', ${DS}data, ${DS}this->lang,${DS}this));
    } 
    
    protected function getList()
    {
    ${DS}filter_data = array();
    ${DS}url  = array();

    ${DS}data = array_merge(${DS}data,${DS}filter_data);
    
	${DS}total = 0;
	${DS}pagination = new Pagination();
       ${DS}pagination->total = ${DS}total;
       ${DS}pagination->page = ${DS}this->request->page;
        ${DS}pagination->limit = ${DS}this->config->get('config_limit_admin');
        if (isset(${DS}this->request->get['filter_store'])) {
            ${DS}pagination->url = ${DS}this->url->link('$module_name', 'token=' . ${DS}this->session->data['token'] . ${DS}url . '&page={page}' . '&filter_store=' . ${DS}this->request->get['filter_store'], 'SSL');
        } else {
            ${DS}pagination->url = ${DS}this->url->link('catalog/product', 'token=' . ${DS}this->session->data['token'] . ${DS}url . '&page={page}', 'SSL');
        }

        $data['pagination'] = ${DS}pagination->render();

        ${DS}data['header'] = ${DS}this->load->controller('common/header');
        ${DS}data['column_left'] = ${DS}this->load->controller('common/column_left');
        ${DS}data['footer'] = ${DS}this->load->controller('common/footer');


        ${DS}this->load->model('setting/setting');
        ${DS}this->load->model('setting/store');
        ${DS}default_store = ${DS}this->model_setting_setting->getSettingbyKey('config', 'config_name');

        ${DS}default_store['name'] = ${DS}default_store[0];
        ${DS}default_store['store_id'] = 0;
        ${DS}data['stores'] = ${DS}this->model_setting_store->getStores();
        array_unshift(${DS}data['stores'], ${DS}default_store);


        ${DS}this->response->setOutput(${DS}this->load->view('$module_name _list.tpl', ${DS}data, ${DS}this->lang,${DS}this));
    }
    protected function delete()
    {
    }
    protected function edit()
    {
     ${DS}this->load->language('$module_name');
      ${DS}this->document->setTitle(${DS}this->language->get('heading_title'));
       if ((${DS}this->request->server['REQUEST_METHOD'] == 'POST')) {

            ${DS}this->response->redirect(${DS}this->url->link('$module_name', 'token=' .        ${DS}this->session->data['token'] , 'SSL'));
        }
     ${DS}this->getForm();
    }
    protected function autocomplete()
    {
    }
    
    protected function validateDelete()
    {

     if (!isset(${DS}this->request->post['selected'])) {
                  ${DS}this->error['warning'] = "Please select the items";
              }

        if (!${DS}this->user->hasPermission('modify', '$module_name')) {
            ${DS}this->error['warning'] = ${DS}this->language->get('error_permission');
        }

        return !${DS}this->error;
    }


    
}

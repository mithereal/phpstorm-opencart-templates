<?php
class ControllerModule$module_name extends Controller {
	private ${DS}error = array();

	public function index() {
		${DS}this->load->language('module/$module_name');

		${DS}this->document->setTitle(${DS}this->language->get('heading_title'));

		${DS}this->load->model('setting/setting');

		if ((${DS}this->request->server['REQUEST_METHOD'] == 'POST') && ${DS}this->validate()) {
			${DS}this->model_setting_setting->editSetting('filter', ${DS}this->request->post);

			${DS}this->session->data['success'] = ${DS}this->language->get('text_success');

			${DS}this->response->redirect(${DS}this->url->link('extension/module', 'token=' . ${DS}this->session->data['token'], 'SSL'));
		}

		${DS}data['heading_title'] = ${DS}this->language->get('heading_title');

		${DS}data['text_edit'] = ${DS}this->language->get('text_edit');
		${DS}data['text_enabled'] = ${DS}this->language->get('text_enabled');
		${DS}data['text_disabled'] = ${DS}this->language->get('text_disabled');

		${DS}data['entry_status'] = ${DS}this->language->get('entry_status');

		${DS}data['button_save'] = ${DS}this->language->get('button_save');
		${DS}data['button_cancel'] = ${DS}this->language->get('button_cancel');

		if (isset(${DS}this->error['warning'])) {
			${DS}data['error_warning'] = ${DS}this->error['warning'];
		} else {
			${DS}data['error_warning'] = '';
		}

		${DS}data['breadcrumbs'] = array();

		${DS}data['breadcrumbs'][] = array(
			'text' => ${DS}this->language->get('text_home'),
			'href' => ${DS}this->url->link('common/dashboard', 'token=' . ${DS}this->session->data['token'], 'SSL')
		);

		${DS}data['breadcrumbs'][] = array(
			'text' => ${DS}this->language->get('text_module'),
			'href' => ${DS}this->url->link('extension/module', 'token=' . ${DS}this->session->data['token'], 'SSL')
		);

		${DS}data['breadcrumbs'][] = array(
			'text' => ${DS}this->language->get('heading_title'),
			'href' => ${DS}this->url->link('module/$module_name', 'token=' . ${DS}this->session->data['token'], 'SSL')
		);

		${DS}data['action'] = ${DS}this->url->link('module/$module_name', 'token=' . ${DS}this->session->data['token'], 'SSL');

		${DS}data['cancel'] = ${DS}this->url->link('extension/module', 'token=' . ${DS}this->session->data['token'], 'SSL');

		if (isset(${DS}this->request->post['filter_status'])) {
			${DS}data['filter_status'] = ${DS}this->request->post['filter_status'];
		} else {
			${DS}data['filter_status'] = ${DS}this->config->get('filter_status');
		}

		${DS}data['header'] = ${DS}this->load->controller('common/header');
		${DS}data['column_left'] = ${DS}this->load->controller('common/column_left');
		${DS}data['footer'] = ${DS}this->load->controller('common/footer');

		${DS}this->response->setOutput(${DS}this->load->view('module/$module_name.tpl', ${DS}data));
	}

	protected function validate() {
		if (!${DS}this->user->hasPermission('modify', 'module/$module_name')) {
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
    
}
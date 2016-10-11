<?php

class Model$Extension_Name$Model_Name extends Model {

    public
    function add$Model_Name(${DS}data){
        ${DS}this->event->trigger('pre.admin.$Model_Name.add', $data);

${DS}sql = "INSERT INTO " . DB_PREFIX . "$Model_Name SET `name` = '" . $this->db->escape($data['name']) . "'";
${DS}this->db->query(${DS}sql);

${DS}last_id = ${DS}this->db->getLastId();

${DS}this->event->trigger('post.admin.$Model_Name.add', ${DS}last_id);

		return ${DS}last_id;
    }

    public function edit$Model_Name(${DS}data){
        ${DS}this->event->trigger('pre.admin.$Model_Name.edit', $data);

${DS}sql = "Update " . DB_PREFIX . "$Model_Name SET `name` = '" . $this->db->escape($data['name']) . "'" . "' WHERE `_id` = '" . (int)${DS}data['_id'] . "'";
${DS}this->db->query(${DS}sql);

${DS}last_id = ${DS}this->db->getLastId();

${DS}this->event->trigger('post.admin.$Model_Name.edit', ${DS}last_id);

		return ${DS}last_id;
    }

    public function get$Model_Name(${DS}data){

        ${DS}sql = "Select * From " . DB_PREFIX . "$Model_Name";
${DS}this->db->query(${DS}sql);

${DS}last_id = ${DS}this->db->getLastId();


		return ${DS}last_id;
    }

    public function delete$Model_Name(${DS}data){
        ${DS}this->event->trigger('pre.admin.$Model_Name.edit', $data);

${DS}sql = "delete from " . DB_PREFIX . "$Model_Name  WHERE `_id` = '" . (int)${DS}data['_id'] . "'";
${DS}query = ${DS}this->db->query(${DS}sql);
return ${DS}query->countAffected();
    }
}
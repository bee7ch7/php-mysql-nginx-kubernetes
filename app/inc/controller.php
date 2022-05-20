<?php

class hrinfo extends mysqldb {

  function getEmployees($get = null) {

    if ($get !== null) {

    //   $binds = array(
    //   'store' => $store,
    //   'order' => $order
    // );

        return $this->select(
      "
      select *

      from employees
      where 1=1
      
      limit 15
      ;" );
    } else {
      return "error in params";
    }
  }

  function setSecurityValidatedDoc($store = null, $order = null, $lmorder_creation = null) {

    if ($store !== null and $order !== null and $lmorder_creation !== null) {

      $binds = array(
      'store' => $store,
      'order' => $order,
      'lmorder_creation' => $lmorder_creation
    );

        return $this->insert(
      "
      insert into lmorder.security_validated_docs
                                      (`store`, `order`, `validated`, `lmorder_creation`, `created_at`)
                                      VALUES (:store,:order,'1',:lmorder_creation,now());

      ;
      ", $binds);
    } else {
      return "error in params";
    }
  }

    function deleteShipmentNP($delete_shipment_uuid = null, $ldap = null) {

    if ($delete_shipment_uuid !== null and $ldap !== null) {

      $binds = array(
      'delete_by' => $ldap,
      'delete_shipment_uuid' => $delete_shipment_uuid
    );

        return $this->update(
      "
      update lmorder.up_shipments
      set
      shipment_uuid = null,
      canceled = 1,
      updated_at = now(),
      canceled_by = :delete_by
      where shipment_uuid = :delete_shipment_uuid

      ;
      ", $binds);
    } else {
      return "shipment_uuid or ldap is missing";
    }
  }


    function deleteOrderFromPL($store = null, $order = null) {

    if ($store !== null and $order !== null) {

      $binds = array(
      'store' => $store,
      'order' => $order
    );

        return $this->delete(
      "
      delete
        from
      lmorder.npl_picking_lists
        where
      `order` = :order
      and
      `store` = :store

      ", $binds);

    } else {
      return "data is not valid";
    }
  }



}

?>
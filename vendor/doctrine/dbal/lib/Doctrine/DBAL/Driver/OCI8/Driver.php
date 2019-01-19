<?php
 namespace Doctrine\DBAL\Driver\OCI8; use Doctrine\DBAL\DBALException; use Doctrine\DBAL\Driver\AbstractOracleDriver; class Driver extends AbstractOracleDriver { public function connect(array $params, $username = null, $password = null, array $driverOptions = array()) { try { return new OCI8Connection( $username, $password, $this->_constructDsn($params), isset($params['charset']) ? $params['charset'] : null, isset($params['sessionMode']) ? $params['sessionMode'] : OCI_DEFAULT, isset($params['persistent']) ? $params['persistent'] : false ); } catch (OCI8Exception $e) { throw DBALException::driverException($this, $e); } } protected function _constructDsn(array $params) { return $this->getEasyConnectString($params); } public function getName() { return 'oci8'; } } 
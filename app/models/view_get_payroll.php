<?php
class ViewGetPayroll extends AppModel {
	var $name = 'ViewGetPayroll';
	var $useDbConfig = 'mssql_payroll';
	var $displayField = 'Nombre';
// 	var $virtualFields = array(
// 						'virtual_name' => "(rtrim(ltrim(ViewGetPayrolls.Nombre)) + ' ' + rtrim(ltrim(ViewGetPayrolls.Apepat)))"
// 				   );
	var $primaryKey = 'Cvetra';
}

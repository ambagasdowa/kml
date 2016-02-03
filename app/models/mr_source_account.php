<?php
class MrSourceAccount extends AppModel {
	var $name = 'MrSourceAccount';
	var $useDbConfig = 'mssql_sistemas';
	var $displayField = 'SubAccount';

// JW - Behavior initiated from plugin. 
	var $actsAs = array('Search.Searchable');
	var $filterArgs = array(array('name' => 'company', 'type' => 'query', 'method' => 'filterTitle'));
	
// JW - method as decalred in $filterArgs to process the free form search.
	function filterTitle($data, $field = null) {
		
// 		debug($data);
		if (empty($data['company'])) {
			return array();
		}
		$company = '%' . $data['company'] . '%';
		return array(
			'OR'  => array(
				$this->alias . '.company LIKE' => $company,
				$this->alias . '.source_company LIKE' => $company,
				$this->alias . '._key LIKE' => $company,
				$this->alias . '.SubAccount LIKE' => $company,
			));
	}
	
// select COUNT(SubAccount) as SubAccounts, mr_source_controls_id,company,source_company,_key from sistemas.dbo.mr_source_accounts -- takes configuration form hir 
// where _key in ('OF','OV','MF','MV') group by company ,source_company,mr_source_controls_id,_key order by source_company
	function monitor_accounts() {
		
		$fields = array('COUNT(MrSourceAccount.SubAccount) as [records] ','mr_source_controls_id','company','source_company','_key');
		$conditions = array('MrSourceAccount._key'=>array('OF','OV','MF','MV'));
		$group = array('MrSourceAccount.company','MrSourceAccount.source_company','MrSourceAccount.mr_source_controls_id','MrSourceAccount._key');
		$order = array('MrSourceAccount.source_company');
		$prev_result = $this->find('all',array('fields'=>$fields,'conditions'=>$conditions,'group'=>$group,'order'=>$order));
		
		foreach ($prev_result as $indx => $arreange) {
			foreach ($arreange as $int_indx => $arrContent) {
// 				debug($arrContent);
				$buildResult['MrSourceAccount'][$indx] = $arrContent;
				$buildResult['MrSourceAccount'][$indx]['records'] = $arreange['0']['records'];
			}
		}
		
// 		debug($result);
		return $buildResult;
	}

	
} //end Class

?>
<?php
// Xử lý excel
	
	//load worksheet template
	$this->PhpExcel->loadWorksheet(WWW_ROOT.'/reports_template/employee.xlsx');
	$this->PhpExcel->setRow(4); // bắt đầu ghi dữ liệu vào file excel từ dòng thứ 4
	
	//create new empty worksheet and set default font
	//$this->PhpExcel->createWorksheet('Cabliri', 12, null, null, 0);

	//define table cell
	// $table = array(
	// 	array('label' => __('ID'), 'fiter' => true),
 //        array('label' => __('Username'), 'filter' => true),
 //        array('label' => __('Fullname'), 'filter' => true),
 //        array('label' => __('Email company'), 'fiter' => true),
 //        array('label' => __('Email personal'), 'fiter' => true),
 //        array('label' => __('Chatwork'), 'fiter' => true),
 //        array('label' => __('Skype'), 'fiter' => true),
 //        array('label' => __('Telephone'), 'fiter' => true),
 //        array('label' => __('Gender'), 'fiter' => true),
 //        array('label' => __('Date of birth'), 'fiter' => true),
 //        array('label' => __('Department'), 'fiter' => true),
 //        array('label' => __('Position'), 'fiter' => true),
 //        array('label' => __('User type'), 'fiter' => true),
 //        array('label' => __('Skill'), 'fiter' => true),
 //        array('label' => __('Literacy'), 'fiter' => true),
 //        array('label' => __('Contract type'), 'fiter' => true),
 //        array('label' => __('Work address'), 'fiter' => true),
 //        array('label' => __('Status'), 'fiter' => true),
 //        array('label' => __('Address'), 'fiter' => true),
 //        array('label' => __('Bank account'), 'fiter' => true),
 //        array('label' => __('Id number'), 'fiter' => true),
 //        array('label' => __('Join datetime'), 'fiter' => true),
 //        array('label' => __('Exit datetime'), 'fiter' => true)
 //    );

 //    // add heading with different font and bold text
 //    $this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

    //add data
	foreach ($users as $row) {
		$gender ="";
		if ($row['User']['gender'] == 0) $gender = "Nam";
		else if ($row['User']['gender'] == 1) $gender = "Nữ";
		else $gender = "Khác";
		$birthday = date('Y-m-d', strtotime($row['User']['birthday']));
		$join_datetime =  date('Y-m-d', strtotime($row['User']['join_datetime']));
		$exit_datetime = date('Y-m-d', strtotime($row['User']['exit_datetime']));
		
		$this->PhpExcel->addTableRow(array(
			$row['User']['id'],
			$row['User']['username'],
			$row['User']['fullname'],
			$row['User']['email_company'],
			$row['User']['email_personal'],
			$row['User']['chatwork'],
			$row['User']['skype'],
			$row['User']['tel'],
			$gender,
			$birthday,
			$row['User']['department'],
			$row['User']['position'],
			$row['User']['user_type'],
			$row['User']['skill'],
			$row['User']['literacy'],
			$row['User']['contract_type'],
			$row['User']['work_address'],
			$row['User']['status'],
			$row['User']['address'],
			$row['User']['bank_account'],
			$row['User']['id_number'],
			$join_datetime,
			$exit_datetime
		));
	}

	// export file
	$this->PhpExcel->output('list_of_employees.xlsx');

?>
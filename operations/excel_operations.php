<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : operations.php

Description : database related operations.
*/

date_default_timezone_set("Asia/Kolkata");

class Excel extends PHPExcel{
     
     public function ReadData($file){
         $array = array();
         $row = 1;
         if (($handle = fopen($file["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                $dm[$c] =  $data[$c];
            }
            array_push($array,$dm);
        }
        fclose($handle);
        }
        if(sizeof($array)) 
            return $array;
         else
             return 0;
     }
    
    function convert($exceldata,$title,$filename,$fontsize){
                $this->setActiveSheetIndex(0);
                //name the worksheet
                $colm_name = $this->GetCols($exceldata);
                $difinedcols = $this->GetAlphabates(sizeof($colm_name));
                $alphabates = $this->GetAlphabatesRow(sizeof($colm_name));
                
                $this->getActiveSheet()->setTitle($title);
                //set cell A1 content with some text
                $i=0;
                foreach($colm_name as $key =>$value) {
                    $this->getActiveSheet()->setCellValue("$alphabates[$i]", "$value");
                    $i++;
                }
               
                foreach($alphabates as $key =>$value) {
                $this->getActiveSheet()->getStyle($value)->getFont()->setBold(true);
                }
              $order = end($difinedcols);  
              for($col = ord('A'); $col <= ord($order); $col++){
                //set column dimension
                $this->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->getActiveSheet()->getStyle(chr($col))->getFont()->setSize($fontsize);                
        }
                $this->getActiveSheet()->fromArray($exceldata, null, 'A2');
                ob_end_clean();
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); 
                header('Cache-Control: max-age=0'); 
                $objWriter = PHPExcel_IOFactory::createWriter($this, 'Excel5'); 
                return $objWriter->save('php://output');
    }
       
    function createColumnsArray($end_column, $first_letters = ''){
      $columns = array();
      $length = strlen($end_column);
      $letters = range('A', 'Z');

      // Iterate over 26 letters.
      foreach ($letters as $letter) {
          // Paste the $first_letters before the next.
          $column = $first_letters . $letter;

          // Add the column to the final array.
          $columns[] = $column;

          // If it was the end column that was added, return the columns.
          if ($column == $end_column)
              return $columns;
      }

      // Add the column children.
      foreach ($columns as $column) {
          // Don't itterate if the $end_column was already set in a previous itteration.
          // Stop iterating if you've reached the maximum character length.
          if (!in_array($end_column, $columns) && strlen($column) < $length) {
              $new_columns = createColumnsArray($end_column, $column);
              // Merge the new columns which were created with the final columns array.
              $columns = array_merge($columns, $new_columns);
          }
      }

      return $columns;
    }
    
    function GetAlphabatesRow($count) {
       $alphabates = $this->createColumnsArray('Z');       
       $j=1;    
       for($i=0;$i<$count;$i++) {
           
           $character = $alphabates[$i].$j;
           $a[] = $character;
          
       } 
       return $a;
    }
    function GetAlphabates($count) {
       $alphabates = $this->createColumnsArray('Z'); 
       for($i=0;$i<$count;$i++) {
           
           $character = $alphabates[$i];
           $a[] = $character;
          
       } 
       return $a;
    }
    
    function GetCols($exceldata){
       
            
            foreach ($exceldata[0] as $key =>$value) {
    // don't include password
               $d[] = $key;
             }
        return $d;
        
    }
    function toNum($s) {
        $data = strtolower($s);
    $alphabet = array( 'a', 'b', 'c', 'd', 'e',
                       'f', 'g', 'h', 'i', 'j',
                       'k', 'l', 'm', 'n', 'o',
                       'p', 'q', 'r', 's', 't',
                       'u', 'v', 'w', 'x', 'y',
                       'z'
                       );
    $alpha_flip = array_flip($alphabet);
    $return_value = -1;
    $length = strlen($data);
    for ($i = 0; $i < $length; $i++) {
        $return_value +=
            ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
    }
    return $return_value + 1;
    }
    
    function readastable($sheet) {
      $highestrow = $sheet->getHighestRow();
      $highestcolumn = $sheet->getHighestColumn();
      $columncount = $this->toNum($highestcolumn);
      $titles = $sheet->rangeToArray('A1:' . $highestcolumn . "1");
      $boddy = $sheet->rangeToArray('A2:' . $highestcolumn . $highestrow);
      $table = array();
      for ($row = 0; $row <= $highestrow - 2; $row++) {
        $a = array();
        for ($column = 0; $column <= $columncount - 1; $column++) {
          $a[$titles[0][$column]] = $boddy[$row][$column];
        }
        $table[$row] = $a;
      }
      return $table;
    }
    function ReadExcelFile($filename){
                
                $inputFileName = $filename;
                $inputFileName;                           
		 		$inputFileType = PHPExcel_IOFactory::identify($inputFileName); // Holding the FileName to Get uploaded
				$objReader = PHPExcel_IOFactory::createReader($inputFileType); // Here createReader is Function Which Reads the Excel Sheets
				$objPHPExcel = $objReader->load($inputFileName); // this file loads the excel files...
				$sheet = $objPHPExcel->getSheet(0); // for getting the sheet of excel file.
			    return $table = $this->readastable($sheet);
    }
      
}



?>
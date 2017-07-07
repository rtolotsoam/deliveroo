<?php

 /*add by Mahefarivo*/
class Style_export extends CI_Controller
{

        public function __construct()
          {
              parent::__construct();
          }

       public function center()
       {
            return array(
            'alignment'=>array(
            'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap' => TRUE,   
            )           
        );
       }

       public function top()
       {
            return array(
                'alignment'=>array(
                'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical'=>PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => TRUE,   
                )           
            );
       }

       public function underline ()
       {
         return array(
              'font' => array(
                'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE
              )
            );
       }

       public function italic()
       {
            return  array(
                 'font'    => array(
                 'name'      => 'Arial',
                 'italic'    => true,
                 /**'color'     => array(
                 'rgb' => '495CFF'
           )*/));
       }

       public function left()
       {
            return array(
                'alignment'=>array(
                'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical'=>PHPExcel_Style_Alignment::VERTICAL_TOP,
                'setBold'=>TRUE,
                'wrap' => TRUE,   
              )           
          );
       }

      public function right()
       {
         return array(
                  'alignment'=>array(
                  'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                  'setBold'=>TRUE,
                  'wrap' => TRUE,   
               )           
             );
       }

       public function background($col_hexa)
       {
            return array(
                        'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => $col_hexa)
                    )
            );
       }

       public function font_color($color_font_hexa)
       {
            return array('font' => array(
                            'color' => array('rgb' => $color_font_hexa)
                ));
       }
       public function border_style($border_color)
       {
        return  array(
               'borders' => array(
                 'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => $border_color),
           
                 ),
               ),
          );
        
       }
}
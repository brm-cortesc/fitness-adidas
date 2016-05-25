<?php
/**
 * Table Definition for ft_camiseta
 */

class DataObject_FtCamiseta extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ft_camiseta';                     // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idRefe;                          // int(11)  
    public $nombre;                          // string(100)  
    public $cantidadXS;                      // int(11)  
    public $cantidadS;                       // int(11)  
    public $cantidadM;                       // int(11)  
    public $cantidadL;                       // int(11)  
    public $cantidadXL;                      // int(11)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function &staticGet($class,$k,$v=NULL) { return DB_DataObject::staticGet('DataObject_FtCamiseta',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idRefe' =>  DB_DATAOBJECT_INT,
             'nombre' =>  DB_DATAOBJECT_STR,
             'cantidadXS' =>  DB_DATAOBJECT_INT,
             'cantidadS' =>  DB_DATAOBJECT_INT,
             'cantidadM' =>  DB_DATAOBJECT_INT,
             'cantidadL' =>  DB_DATAOBJECT_INT,
             'cantidadXL' =>  DB_DATAOBJECT_INT,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'nombre' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}

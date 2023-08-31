$conditions = array(
        'conditions' => array(
        'and' => array(
                        array('Item.date_start <= ' => $date,
                              'Item.date_end >= ' => $date
                             ),
            'Item.title LIKE' => "%$title%",
            'Item.status_id =' => '1'
            )));

$start_date = '2013-05-26'; //should be in YYYY-MM-DD format
$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));

*************************************************************************************

// just return these two fields
$fields = array('uri', 'page_views');

// use this "between" range
$conditions = array('Event.date BETWEEN ? and ?' => array($start_date, $end_date));

// run the "select between" query
$results = $this->Event->find('all', 
         array('fields'=>$fields, 
               'conditions'=>$conditions));
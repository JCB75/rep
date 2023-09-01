<?php
      $conditions = array(
            'conditions' => array(
                  'and' => array(
                        array(
                              'Item.date_start <= ' => $date,
                              ' Item.date_end>= ' => $date
                        ),
                        'Item.title LIKE' => "%$title%",
                        'Item.status_id =' => '1'
                  )
            )
      );?

      $conditions = array(
            'conditions' => array(
                  'and' => array(
                        'mls LIKE' => "%".$query['mls']."%",
                        'address LIKE' => "%".$query['address']."%",
                        'beds >=' => $query['beds'] ? intval($query['beds']) : 1,
                        'baths >=' => $query['baths'] ? intval($query['baths']) : 1,
                        'sq_ft >=' => $query['sq_ft'] ? intval($query['sq_ft']) : 1,
                        'price between ? and ?' => array(intval($query['min_price']), intval($query['max_price']))


                  )
            )
      );

      // 'mls like' => $query['mls'] ? '%' . $query['mls'] . '%' : '',
      // 'address like' => $query['address'] ? '%' . $query['address'] . '%' : '',
      // 'beds >=' => $query['beds'] ? intval($query['beds']) : 1,
      // 'baths >=' => $query['baths'] ? intval($query['baths']) : 1,
      // 'sq_ft >=' => $query['sq_ft'] ? intval($query['sq_ft']) : 1,
      // 'price between ' . (intval($query['min_price'])) . " and " . (intval($query['max_price']))

      $start_date = '2013-05-26'; //should be in YYYY-MM-DD format
      $this->User->find('all', array(
            'conditions' => array(
                  'User.reg_date BETWEEN ' . $start_date . ' AND
            DATE_ADD(' . $start_date . ', INTERVAL 30 DAY)'
            )
      )
      );


      // just return these two fields
      $fields = array('uri', 'page_views');

      // use this "between" range
      $conditions = array('Event.date BETWEEN ? and ?' => array($start_date, $end_date));

      // run the "select between" query
      $results = $this->Event->find(
            'all',
            array(
                  'conditions' => $conditions
            )
      );

?>
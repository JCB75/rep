<?php
declare(strict_types=1);

namespace App\Controller;
/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
            $query = $this->request->getQueryParams();

            if ($query) {
                    foreach ($query as $k => $v) {
                        $params[$k] = match ($k) {
                        'date' => $v,
                        'min_price' => ($v ? $v : 1),
                        'max_price' => ($v ? $v : 500000),
                        default => $v,
                        };
                    }
                } else{                  
                    $params['min_price'] = 1;
                    $params['max_price'] = 500000;
                }


            $results = ($query) ? $this->Properties->find('all')
                ->where([
                    '`mls` LIKE' => '%'.$params['mls'].'%',
                    '`address` LIKE' => '%'.$params['address'].'%',
                    '`beds` >=' => $params['beds'],
                    '`baths` >=' => $params['baths'],
                    '`sq_ft` >=' => $params['sq_ft'],
                    '`price` BETWEEN :min AND :max',
                    '`date` >= ' => $params['date']
                ])
                ->bind(':min', intval($params['min_price']))
                ->bind(':max', intval($params['max_price']))
                : $this->Properties;
            // dd($results);
            $properties = $this->paginate($results);
            $this->set(compact('properties'));
    }
    // 
    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('property'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
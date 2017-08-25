<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'testThumb', 'subscribe', 'helpcentre']);
    }

    public function display($slug = null) {
        $page = $this->Pages->find('all', array('conditions' => array('slug' => $slug)))->first()->toArray();

        $this->set('page', $page);
        $this->set('title', $page['title']);

        $this->set('page_header', $page['title']);
        $breadcrumb = array();
        $breadcrumb[] = array('title' => "Home", 'link' => '/');
        $breadcrumb[] = array('class' => 'active', 'title' => $page['title']);
        $this->set('breadcrumb', $breadcrumb);

        if (empty($page)) {
            throw new NotFoundException();
        }
    }

    public function subscribe() {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $this->Subscribers = TableRegistry::get("Subscribers");
            $subscriber_record = $this->Subscribers->find('all', array('conditions' => ['email' => $data['subscribe_email']]));
            if ($subscriber_record->count() == 0) {
                $new_subscriber = array();
                $new_subscriber['email'] = $data['subscribe_email'];
                $this->Subscribers->saveData($new_subscriber);
                $this->Flash->success(__('You have successfully subscribed to the newsletter.'));
            } else {
                $this->Flash->success(__('You have already subscribed to our newsletter'));
                $this->redirect($this->referer());
            }
        } else {
            $this->Flash->success(__('Wrong navination.'));
        }
        $this->redirect($this->referer());
    }

    public function contact() {
        $this->set('title', "Contact Us");

        if ($this->request->is('post')) {

            $this->Messages = TableRegistry::get('Messages');
            $data = $this->request->data;

            if (!empty($data['attachment']['name'])) {
                $allowed = array('gif', 'png', 'jpg');
                $filename = $data['attachment']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $this->Flash->success(__('File must be JPG, GIF or PNG, less than 2MB.'));
                    return $this->redirect($this->referer());
                }

                $file_size = $data['attachment']['size'];
                if (($file_size > 2097152)) {
                    $this->Flash->success(__('File must be JPG, GIF or PNG, less than 2MB.'));
                    return $this->redirect($this->referer());
                }
            }
            $data['user_id'] = $this->Auth->user('id');
            $message_obj = $this->Messages->saveData($data);

            $complain_number = $this->General->generate_complain_id($message_obj->id);
            $this->__updateField("Messages", ['complain_number' => $complain_number], ["id" => $message_obj->id]);

            $message_data = $this->Messages->get($message_obj->id, ['contain' => ['Users']]);
            $complain_number = $message_data->complain_number;

            //Mail to Contact USer: Start
            $mail_data = array();
            $mail_data['to'] = $message_data->user->username;
            $mail_data['subject'] = $message_data->subject;
            $mail_data['full_name'] = $message_data->user->name;
            $mail_data['complain_number'] = $complain_number;
            $this->Mailcontent->contactusmail_to_user($mail_data);
            //Mail to Contact USer: End
            //
            //
            //Mail to Contact : Admin Panel : Start
            $mail_data = array();
            $mail_data['from'] = $message_data->user->username;
            $mail_data['full_name'] = $message_data->user->name;
            $mail_data['complain_number'] = $complain_number;
            $mail_data['subject'] = $message_data->subject;
            $mail_data['message'] = $message_data->message;
            $mail_data['order_id'] = $message_data->order_id;
            $this->Mailcontent->contactusmail_to_admin($mail_data);
            //Mail to Contact : Admin Panel : End            
            $this->Flash->success(__('Thank you for contacting us we will get back to you soon.'));
            $this->redirect($this->referer());
        }

        $this->set('page_header', "Contact Us");
        $breadcrumb = array();
        $breadcrumb[] = array('title' => "Home", 'link' => '/');
        $breadcrumb[] = array('class' => 'active', 'title' => "Contact Us");
        $this->set('breadcrumb', $breadcrumb);
    }

    public function contact_bk() {
        $this->set('title', "Contact Us");

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->Mailcontent->contactusMail($data);
            $this->Mailcontent->contactusMailToUser($data);
            $this->Flash->success(__('Thank you for contacting us we will get back to you soon'));
            $this->redirect($this->referer());
        }

        $this->set('page_header', "Contact Us");
        $breadcrumb = array();
        $breadcrumb[] = array('title' => "Home", 'link' => '/');
        $breadcrumb[] = array('class' => 'active', 'title' => "Contact Us");
        $this->set('breadcrumb', $breadcrumb);
    }

    public function helpcentre() {
        $this->set('title', "Help Centre");
        $this->set('page_header', "Help Centre");

        $breadcrumb = array();
        $breadcrumb[] = array('title' => "Home", 'link' => '/');
        $breadcrumb[] = array('class' => 'active', 'title' => "Help Centre");
        $this->set('breadcrumb', $breadcrumb);

        $this->Faqs = TableRegistry::get('Faqs');
        $faq_list = $this->Faqs->find("all", ['conditions' => ['is_active' => 1, 'is_delete' => 0]]);

        $faq_category = $this->__getFaqCategories();

        $keys = array_keys($faq_category);
        $faq_category = array_fill_keys($keys, array());

        foreach ($faq_list as $faq) {
            $faq_category[$faq->category][] = $faq->toArray();
        }
        $this->set("faq_category", $faq_category);

        $topmost_faq_list = $this->Faqs->find("all", ['limit' => 7, 'conditions' => ['is_active' => 1, 'is_delete' => 0, 'is_topmost' => 1]]);
        $this->set("topmost_faq_list", $topmost_faq_list);
    }

    public function testThumb() {
        set_time_limit(0);
        $dirs = scandir('upload/posts/');

        foreach ($dirs as $value) {

            if (is_file('upload/posts/' . $value)) {
                $ext = pathinfo($value, PATHINFO_EXTENSION);
                if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
                    $this->Pages->createthumb('./upload/posts/' . $value, '', 600, 600, false, './upload/posts/thumb_new/' . $value);
                }
            }
        }
        exit("Done");
        //echo '<pre>';print_r($dirs); exit();
    }

}

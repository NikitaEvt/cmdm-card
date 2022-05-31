<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends FrontEndController
{
    private $page_id;

    public function __construct()
    {
        parent::__construct();
        $this->page_id = 1;
    }

    private function _load_main_page($page)
    {
        $this->data['page_title'] = (!empty($page->otitle)) ? $page->otitle : $page->title;
        $this->data['page_name'] = $page->title;
        $this->data['text'] = $page->text;
        $this->data['image'] = '/assets/img/og_img.png';
        $this->data['keywords'] = $page->keywords;
        $this->data['description'] = $page->description;
        $this->data['otitle'] = (!empty($page->otitle)) ? $page->otitle : $page->title;
        $this->data['header'] = "layouts/header/header_order";
        $this->data['footer'] = "layouts/footer/footer_order";
    }

    private function loadOGImgData($page = false)
    {
        if (empty($page)) throw_on_404();

        if (!empty($page->img)) {
            $this->data['og_img'] = newthumbs($page->img, 'menu', 500, 300, 'og500x300x1', 1);
            $this->data['og_img_width'] = 500;
            $this->data['og_img_height'] = 300;
        } else {
            $this->data['og_img'] = '/public/i/null.png';
            $this->data['og_img_width'] = 214;
            $this->data['og_img_height'] = 51;
        }
    }

    public function index()
    {
        $page = $this->menu_model->get_page_data_by_id($this->page_id, $this->clang);
        if (empty($page)) throw_on_404();


        $this->loadOGImgData($page);
        $this->_load_main_page($page);

        $this->data['lang_urls'] = array(
            'ru' => '/' . $page->uriRU,
            'ro' => '/' . $page->uriRO,
        );

        $this->data['inner_view'] = 'pages/cart/index';
        $this->_render();
    }
    public function cartOrder()
    {
        $page = $this->menu_model->get_page_data_by_id($this->page_id, $this->clang);
        if (empty($page)) throw_on_404();


        $this->loadOGImgData($page);
        $this->_load_main_page($page);

        $this->data['lang_urls'] = array(
            'ru' => '/' . $page->uriRU,
            'ro' => '/' . $page->uriRO,
        );

        $this->data['inner_view'] = 'pages/cart/order';
        $this->_render();
    }
}

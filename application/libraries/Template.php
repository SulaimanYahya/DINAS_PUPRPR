<?php

class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function load($content, $data = NULL)
    {
        $data['header']      = $this->_ci->load->view('templates/header', $data, TRUE);
        $data['sidebar']      = $this->_ci->load->view('templates/sidebar', $data, TRUE);
        $data['topbar']      = $this->_ci->load->view('templates/topbar', $data, TRUE);
        $data['content']     = $this->_ci->load->view($content, $data, TRUE);
        $data['footer']      = $this->_ci->load->view('templates/footer', $data, TRUE);

        $this->_ci->load->view('templates/index', $data);
    }
}

<?php
class ExampleTest extends CIUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->load->controller('My_Controller');
        $this->load->helper('fshare_helper', 'my_helper');
        $this->load->models('CI_Models');
    }
}

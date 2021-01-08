<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="molivi-bottom">
  <ul>
    <li class="nav-item <?= ($this->uri->segment(1) == 'freelancer-dashboard') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'freelancer-dashboard' ?>"> New </a> </li>
    <li class="nav-item <?= ($this->uri->segment(2) == 'active') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'job-list/active' ?>"> Active </a> </li>
    <li class="nav-item <?= ($this->uri->segment(2) == 'late') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'job-list/late' ?>"> Late </a> </li>
    <li class="nav-item <?= ($this->uri->segment(2) == 'delivered') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'job-list/delivered' ?>"> Delivered </a> </li>
    <li class="nav-item <?= ($this->uri->segment(2) == 'completed') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'job-list/completed' ?>"> Completed </a></li>
    <li class="nav-item <?= ($this->uri->segment(2) == 'cancelled') ? 'active' : '' ?>"> <a class="" href="<?= base_url().'job-list/cancelled' ?>"> Cancelled </a> </li>
  </ul>
</div>
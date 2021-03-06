<?php

/**
 * This file is part of Bootstrap CMS by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 */

namespace GrahamCampbell\BootstrapCMS\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

/**
 * This is the home controller class.
 *
 * @package    Bootstrap-CMS
 * @author     Graham Campbell
 * @copyright  Copyright (C) 2013-2014  Graham Campbell
 * @license    https://github.com/GrahamCampbell/Bootstrap-CMS/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Bootstrap-CMS
 */
class HomeController extends AbstractController
{
    /**
     * The email address.
     *
     * @var string
     */
    protected $email;

    /**
     * The email subject.
     *
     * @var string
     */
    protected $subject;

    /**
     * Create a new instance.
     *
     * @param  string  $email
     * @param  string  $subject
     * @return void
     */
    public function __construct($email, $subject)
    {
        $this->email = $email;
        $this->subject = $subject;

        $this->setPermissions(array(
            'testQueue' => 'admin'
        ));

        parent::__construct();
    }

    /**
     * Show the hello world page.
     *
     * @return \Illuminate\View\View
     */
    public function showWelcome()
    {
        return View::make('index');
    }

    /**
     * Show the test page.
     *
     * @return string
     */
    public function showTest()
    {
        return 'Test 123!';
    }

    /**
     * Send a test activation email.
     *
     * @return string
     */
    public function testQueue()
    {
        $mail = array(
            'url'     => URL::to(Config::get('graham-campbell/core::home', 'pages/home')),
            'link'    => URL::route('account.activate', array('id' => 1, 'code' => 1234)),
            'email'   => $this->email,
            'subject' => $this->subject
        );

        Mail::queue('graham-campbell/credentials::emails.welcome', $mail, function($message) use ($mail) {
            $message->to($mail['email'])->subject($mail['subject']);
        });

        return 'The message has been queued for sending.';
    }
}
